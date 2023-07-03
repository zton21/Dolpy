<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\ProjectHeader;
use App\Models\ProjectDetail;
use App\Models\TopicSection;
use App\Models\Comment;

class UserController extends Controller
{   
    public function getProjects(String $sortby) {
        #SELECT h.projectName, h.projectDueDate, u.firstName FROM
        #project_headers h JOIN project_details m ON h.ID = m.project_ID AND m.role = "Creator" AND h.id IN (SELECT id FROM project_headers h JOIN project_details m ON h.id = m.project_id AND m.user_id = 1)
        #JOIN users u ON u.id = m.user_id
        $x = Auth::user()->id;
        $results = DB::select("SELECT h.projectName, h.projectDueDate, u.firstName, h.id FROM 
            project_headers h JOIN project_details m ON h.ID = m.project_ID AND m.role = 'Creator' 
            AND h.id IN (SELECT id FROM project_headers h JOIN project_details m ON h.id = m.project_id AND m.user_id = :user_id) 
            JOIN users u ON u.id = m.user_id ORDER BY h.created_at", ["user_id" => $x]);
        return $results;
    }

    public function home()
    {
        $userProjects = UserController::getProjects("");

        $data = [
            'user' => Auth::user(),
            'projects' => $userProjects,
            'completed' => [],
        ];
        
        return view('home', $data);
    }

    public function profile()
    {
        $data = [
            'user' => Auth::user(),
        ];
        return view('profile', $data);
    }

    public function topic()
    {
        return view('topic');
    }
    public function files()
    {
        return view('files');
    }

    public function setting()
    {
        $data = [
            'user' => Auth::user(),
        ];
        return view('setting', $data);
    }

    public function get_current_topic(Request $request) {
        $request->validate([
            'topic' => 'numeric|min:0',
        ]);
        return $request->query('topic', 0);
    }

    public function project(Request $request, $id) {
        $result = DB::select(
            "SELECT t.*, u.firstName, c.chatContent FROM topic_sections t
            JOIN users u ON t.user_id = u.id
            LEFT JOIN comments c ON t.last_comment_id = c.id
            WHERE t.project_id = :project_id"
        , ["project_id" => $id]);
        
        $topic_n = UserController::get_current_topic($request);

        if (count($result) == 0) {
            $messages = null;
            $topic = null;
        }
        else {
            $topic = $result[$topic_n];
            $messages = DB::select("SELECT c.*, u.firstName FROM comments c JOIN users u ON c.user_id = u.id 
                WHERE c.topic_id = :topic_id ORDER BY c.created_at"
            , ["topic_id" => $topic->id]);
        }
        
        return view('topic', [
            'user' => Auth::user(),
            'project' => ProjectHeader::find($id),
            'topics' => $result,
            'topic' => $topic,
            'messages' => $messages,
        ]);
        
    }

    public function joinProject($project_id, $user_id, $role) {
        // Validation?

        // Check udah join belom
        $data = DB::table('project_details')
            ->where('user_id', $user_id)
            ->where('project_id', $project_id)
            ->first();
        
        if (!empty($data)) {
            return redirect()->back()->withErrors(['error' => 'Already joined the Project'])->withInput();
        }
        else {
            $ProjectDetail = new ProjectDetail;
            $ProjectDetail->user_id = $user_id;
            $ProjectDetail->project_id = $project_id;
            $ProjectDetail->role = $role;
            $ProjectDetail->save();
        }
        return redirect('home');
    }

    public function createProject(Request $request) {
        $request->validate([
            'project_name' => 'required',
            'due_date' => 'required',
        ]);

        // Create the project
        $project = new ProjectHeader;
        $project->projectName = $request->project_name;
        $project->projectDueDate = $request->due_date;
        $project->projectDescription = $request->project_description;
        $project->projectStatus = 'Designing';

        $project->save();

        // Insert current user as member
        return UserController::joinProject($project->id, Auth::user()->id, "Creator");

    }

    public function quitProject($project_id, $user_id) {
        ProjectDetail::where('user_id', $user_id)
            ->where('project_id', $project_id)
            ->delete();
    }

    public function create_topic(Request $request, $id) {
        $request->validate([
            'topic_name' => 'required',
            'topic_description' => '',
        ]);

        $topic = new TopicSection;
        $topic->topicName = $request->topic_name;
        $topic->topicDate = date("Y-m-d");
        $topic->project_id = $id;
        $topic->user_id = Auth::user()->id;
        $topic->save();

        return redirect()->back();
    }

    public function add_comment(Request $request, $id) {
        $comment = new Comment;
        $comment->chatContent = $request->comment;
        $comment->user_id = Auth::user()->id;
        #ini perlu fix date jadi time (keknya gakepake)
        $comment->chatDate = date("Y-m-d");
        
        $comment->topic_id = $request->topic_id;
        $comment->save();

        # update last comment
        $topic = TopicSection::find($request->topic_id);
        $topic->last_comment_id = $comment->id;
        $topic->save();

        return redirect()->back();
    }

    public function topic_message_handler(Request $request, $id) {
        if ($request->has('task') && $request->task == 'send_message') {
            return UserController::add_comment($request, $id);
        }
        if ($request->has('topic')) {
            return UserController::create_topic($request, $id);
        }
    }

    public function check_for_update(Request $request) {
        $data = TopicSection::find($request->topic_id);
        return $data->last_comment_id;
    }

    public function update_message_handler(Request $request) {
        # validate - not implemented
        $user_id = Auth::user()->id;
        $data = DB::select('select c.*, u.firstName from comments c JOIN users u ON c.user_id = u.id where c.id > ? and c.topic_id = ?;', [$request->last_comment_id, $request->topic_id]);
        // dd($data);
        foreach ($data as $key => $value) {
            $data[$key]->own = ($data[$key]->user_id == $user_id);
        }
        return $data;
    }

    public function calendar()
    {
        return view('calendar');
    }
}
