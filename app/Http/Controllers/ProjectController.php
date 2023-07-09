<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\ProjectHeader;
use App\Models\ProjectDetail;
use App\Models\TopicSection;
use App\Models\Comment;

class ProjectController extends Controller
{
    // Create Project
    public static function create_project(Request $request) {
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
        ProjectController::add_member($project->id, Auth::user()->id);
        ProjectController::set_creator($project->id, Auth::user()->id);
        return redirect()->back();
    }

    // View Project
    // Notes: Message gw ilangin karena rencananya mau pake local storage sama sync perubahan pake websocket
    public static function view_project(Request $request, $project_id) {
        $result = DB::select(
            "SELECT t.*, u.firstName, c.chatContent, (t.n_message - IFNULL(tu.seen, 0)) AS new_message FROM topic_sections t
            JOIN users u ON t.user_id = u.id
            LEFT JOIN comments c ON t.last_comment_id = c.id
            LEFT JOIN topic_user tu ON t.id = tu.topic_id AND u.id = tu.user_id
            WHERE t.project_id = :project_id"
        , ["project_id" => $project_id]);
        
        $topic_n = ProjectController::get_current_topic($request);

        if (count($result) == 0) {
            $messages = null;
            $topic = null;
        }
        else {
            $topic = $result[$topic_n];
            $messages = DB::select("SELECT c.*, u.firstName, u.id FROM comments c JOIN users u ON c.user_id = u.id 
                WHERE c.topic_id = :topic_id ORDER BY c.created_at"
            , ["topic_id" => $topic->id]);

            // Update topic_user 
        }

        

        
        return view('topic', [
            'user' => Auth::user(),
            'project' => ProjectHeader::find($project_id),
            'topics' => $result,
            'topic' => $topic,
            'messages' => $messages,
        ]);
    }

    // Dapetin current topic_id dari query string
    public static function get_current_topic(Request $request) {
        $request->validate([
            'topic' => 'numeric|min:0',
        ]);
        return $request->query('topic', 0);
    }

    // Add member sebagai Member
    public static function add_member($project_id, $user_id) {
        $ProjectDetail = new ProjectDetail;
        $ProjectDetail->user_id = $user_id;
        $ProjectDetail->project_id = $project_id;
        $ProjectDetail->role = "Member";
        $ProjectDetail->save();
    }

    // Set member sebagai creator
    public static function set_creator($project_id, $user_id) {
        $ProjectDetail = ProjectDetail::where('project_id', $project_id)->where('user_id', $user_id)->first();
        $ProjectDetail->role = "Creator";
        $ProjectDetail->save();
    }

    // Remove member
    public static function remove_member($project_id, $user_id) {
        $ProjectDetail = ProjectDetail::where('project_id', $project_id)->where('user_id', $user_id)->delete();
    }
    

    // Create Topic in Project
    public static function create_topic(Request $request, $project_id) {
        $request->validate([
            'topic_name' => 'required',
            'topic_description' => '',
        ]);

        $topic = new TopicSection;
        $topic->topicName = $request->topic_name;
        $topic->topicDate = date("Y-m-d");
        $topic->project_id = $project_id;
        $topic->user_id = Auth::user()->id;
        $topic->save();

        return redirect()->back();
    }
    
    
    public static function project_request_handler(Request $request, $id) {
        if ($request->has('task') && $request->task == 'send_message') {
            return CommentController::add_comment($request, $id);
        }
        if ($request->has('topic')) {
            return ProjectController::create_topic($request, $id);
        }
    }


    public static function pusher_authenticate(Request $request) {
        $project_id = substr($request->channel_name, strpos($request->channel_name, '.') + 1);
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                // 'encryption_master_key_base64' => 'JG5Nd21WbEt7L19wVkIkKixuSG50XktW'
            ],
        );
        $x = $pusher->authorizeChannel($request->channel_name, $request->socket_id);
        
        return response($x, 200);
    }

    public static function member(Request $request, $project_id) {
        $members = ProjectDetail::where('project_id', $project_id)->where('role', '!=', 'pending')
                    ->join('users', 'users.id', 'id')->get();
        $pending = ProjectDetail::where('project_id', $project_id)->where('role', '=', 'pending')
                    ->join('users', 'users.id', 'id')->get();;
        return view('member', [
            'user' => Auth::user(),
            'project' => ProjectHeader::find($project_id),

            'members' => $members,
            'pending' => $pending,
            'n_members' => count($members),
            'n_pending' => count($pending),
            'invite_link' => 'invite-link',
            'role' => $request->role->role,
        ]);
    }
    public static function files($project_id)
    {
        return view('files', [
            'user' => Auth::user(),
            'project' => ProjectHeader::find($project_id),
        ]);
    }

     public static function timeline($project_id)
    {
        return view('timeline', [
            'user' => Auth::user(),
            'project' => ProjectHeader::find($project_id),
        ]);
    }

     public static function timeline_inner()
    {
        return view('timeline_inner');
    }
}