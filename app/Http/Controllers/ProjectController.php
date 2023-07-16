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
use App\Models\TopicUser;
use App\Models\User;
use App\Models\Timeline;

use Pusher\Pusher;

class ProjectController extends Controller
{
    public static function post_home(Request $request) {
        if ($request->has('task') && $request->task == 'create_project') {
            return ProjectController::create_project($request);
        }
        if ($request->has('task') && $request->task == 'complete') {
            return ProjectController::complete_project($request);
        }
        if ($request->has('task') && $request->task == 'uncomplete') {
            return ProjectController::uncomplete_project($request);
        }
        if ($request->has('task') && $request->task == 'leave') {
            return ProjectController::leave_project($request);
        }
        if ($request->has('task') && $request->task == 'delete') {
            return ProjectController::delete_project($request);
        }
        if ($request->has('task') && $request->task == 'edit') {
            return ProjectController::edit_project($request);
        }
    }

    public static function edit_project(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'editProjectTitle' => 'required',
            'editProjectDescription' => '',
            'editProjectDueDate' => 'required',
        ]);

        $projectID = $request->input('project_id');
        $project = ProjectHeader::find($projectID);

        // Update the project properties
        $project->projectName = $validatedData['editProjectTitle'];
        $project->projectDescription = $validatedData['editProjectDescription'];
        $project->projectDueDate = $validatedData['editProjectDueDate'];

        // Save the updated project
        $project->save();

        // Redirect back with a success message
        return back()->with('success', 'Project updated successfully.');
    }


    public static function complete_project(Request $request)
    {
        $projectID = $request->input('project_id');
        $project = ProjectHeader::find($projectID);
        
        if (!$project) {
            return back()->with('error', 'Project not found.');
        }
        
        $user = Auth::user();
        
        if ($project->users()->where('user_id', $user->id)->exists()) {
            // Update the project as completed
            $project->projectCompleted = true;
            $project->save();
            return back()->with('success', 'Project marked as completed.');
        }
    
        return back()->with('error', 'Action could not be performed.');
    }

    public static function uncomplete_project(Request $request)
    {
        $projectID = $request->input('project_id');
        $project = ProjectHeader::find($projectID);
        
        if (!$project) {
            return back()->with('error', 'Project not found.');
        }
        
        $user = Auth::user();
        
        if ($project->users()->where('user_id', $user->id)->exists()) {
            // Update the project as completed
            $project->projectCompleted = false;
            $project->save();
            return back()->with('success', 'Project marked as uncompleted.');
        }
    
        return back()->with('error', 'Action could not be performed.');
    }

    public static function leave_project(Request $request)
    {
        $projectID = $request->input('project_id');
        $project = ProjectHeader::find($projectID);

        if (!$project) {
            return back()->with('error', 'Project not found.');
        }
        
        $user = Auth::user();
        
        if ($project->users()->where('user_id', $user->id)->exists()) {
            // Detach the user from the project
            $project->users()->detach($user->id);
            return back()->with('success', 'You have left the project.');
        }
    
        return back()->with('error', 'Action could not be performed.');
    }

    public static function delete_project(Request $request)
    {
        $projectID = $request->input('project_id');
        $project = ProjectHeader::find($projectID);
        
        if (!$project) {
            return back()->with('error', 'Project not found.');
        }
        
        $user = Auth::user();
        
        if ($project->users()->where('user_id', $user->id)->where('role', 'creator')->exists()) {
            // Delete the project and detach all members
            $project->users()->detach();
            $project->delete();
            return back()->with('success', 'Project deleted successfully.');
        }
    
        return back()->with('error', 'Action could not be performed.');
    }

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
        $project->projectWallpaperURL = 'img/project_wallpaper/Wallpaper1.png';

        $project->save();

        // Create timeline base
        foreach (array('todo', 'onprogress', 'done') as $group) {
            $timeline = new Timeline;
            $timeline->next = -1;
            $timeline->type = 'head';
            $timeline->group = $group;
            $timeline->project_id = $project->id;
            $timeline->timelineTitle = "";
            $timeline->timelineDesc = "";
            $timeline->save();
        }


        // Insert current user as member
        ProjectController::add_member($project->id, Auth::user()->id);
        ProjectController::set_creator($project->id, Auth::user()->id);
        return redirect()->back();
    }

    // View Project
    // Notes: Message gw ilangin karena rencananya mau pake local storage sama sync perubahan pake websocket
    public static function view_project(Request $request, $project_id) {
        $result = DB::select(
            "SELECT t.*, u.firstName, c.chatContent, (t.n_message - IFNULL(tu.seen, 0)) AS new_message 
            FROM topic_sections t JOIN users u                              
            LEFT JOIN topic_user tu ON t.id = tu.topic_id AND u.id = tu.user_id 
            LEFT JOIN comments c ON t.last_comment_id = c.id   
            WHERE t.project_id = :project_id AND u.id = :user_id" 
        , ['user_id' => Auth::user()->id, 'project_id' => $project_id]);
        
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
        };

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
        if (ProjectDetail::where('project_id', $project_id)->where('user_id', $user_id)->first()) return;
        $ProjectDetail = new ProjectDetail;
        $ProjectDetail->user_id = $user_id;
        $ProjectDetail->project_id = $project_id;
        $ProjectDetail->role = "Member";
        $ProjectDetail->save();
    }

    // Set member sebagai creator
    public static function set_creator($project_id, $user_id) {
        DB::update('UPDATE project_details SET role = "Creator" WHERE project_id = ? AND user_id = ?', [$project_id, $user_id]);
        // $ProjectDetail = ProjectDetail::where('project_id', $project_id)->where('user_id', $user_id)->first();
        // $ProjectDetail->role = "Creator";
        // $ProjectDetail->save();
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
        $topic->topicDescription = $request->topic_description;
        $topic->topicDate = date("Y-m-d");
        $topic->project_id = $project_id;
        $topic->user_id = Auth::user()->id;
        $topic->save();

        return redirect()->back();
    }
    
    
    public static function pusher() {
        return new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            [
                'cluster' => env('PUSHER_APP_CLUSTER'),
            ],
        );
    }

    public static function pusher_authenticate(Request $request) {
        $project_id = substr($request->channel_name, strpos($request->channel_name, '.') + 1);
        $pusher = ProjectController::pusher();
        $x = $pusher->authorizeChannel($request->channel_name, $request->socket_id);
        
        return response($x, 200);
    }

    public static function member(Request $request, $project_id) {
        $members = DB::select('SELECT * FROM project_details d 
            JOIN users u ON d.user_id = u.id
            WHERE d.project_id = ? AND d.role != "pending"', [$project_id]);
        $pending = DB::select('SELECT * FROM project_details d 
            JOIN users u ON d.user_id = u.id
            WHERE d.project_id = ? AND d.role = "pending"', [$project_id]);
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

    public static function read_message(Request $request, $project_id) {
        // Validasi
        \DB::enableQueryLog();
        $topic = TopicSection::find($request->topic_id);
        if (!$topic) return response('Forbidden', 403);
        if ($topic->project_id != $project_id) response('Forbidden', 403);
        
        $user_id = Auth::user()->id;

        $data = TopicUser::where('topic_id', $topic->id)->where('user_id', $user_id)->first();
        if (!$data) {
            $data = new TopicUser; 
            $data->topic_id = $topic->id; 
            $data->user_id = $user_id;
            $data->seen = $topic->n_message;
            $data->save();
        }
        else {
            // TopicUser::where('topic_id', $topic->id)->where('user_id', $user_id)
            //     ->update(['seen', $topic->n_message]);

            DB::update('UPDATE topic_user SET seen = ? where topic_id = ? AND user_id = ?', [$topic->n_message, $topic->id, $user_id]);
        }
        // dd($topic, $data);

        // dd(\DB::getQueryLog());
    }

    public static function files($project_id)
    {
        return view('files', [
            'user' => Auth::user(),
            'project' => ProjectHeader::find($project_id),
        ]);
    }

    
    public static function timeline_inner($project_id)
    {
        return view('timeline_inner', [
            'user' => Auth::user(),
            'project' => ProjectHeader::find($project_id),
        ]);
    }

    public static function post_chat(Request $request, $id) {
        if ($request->has('task') && $request->task == 'send_message') {
            return CommentController::add_comment($request, $id);
        }
        if ($request->has('task') && $request->task == 'read') {
            return ProjectController::read_message($request, $id);
        }
        if ($request->has('task') && $request->task == 'create_topic') {
            return ProjectController::create_topic($request, $id);
        }
        if ($request->has('task') && $request->task == 'edit_topic') {
            return ProjectController::edit_topic($request, $id);
        }
        if ($request->has('task') && $request->task == 'delete_topic') {
            return ProjectController::delete_topic($request, $id);
        }
    }

    public static function edit_topic(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'editTopicTitle' => 'required',
            'editTopicDescription' => '',
        ]);

        $topicID = $request->input('topic_id');
        $topic = TopicSection::find($topicID);

        $topic->topicName = $validatedData['editTopicTitle'];
        $topic->topicDescription = $validatedData['editTopicDescription'];
        $topic->save();

        return redirect()->back()->with('success', 'Topic updated successfully.');
    }

    public static function delete_topic(Request $request, $id)
    {
        $topicID = $request->input('topic_id');
        $topic = TopicSection::find($topicID);
        
        $topic->delete();

        return back()->with('success', 'Topic deleted successfully.');
    }

    public static function post_member(Request $request, $id) {
        if ($request->has('task') && $request->task == 'invite') return ProjectController::invite_member($request, $id);
        return response('Request not recognized', 200);
    }

    public static function invite_member(Request $request, $project_id) {
        if ($request->role->role != 'Creator') return response('Only creator can invite member', 403);
        
        // Langsung add :
        $to_invite = User::where('email', $request->member_email)->first();
        if (!$to_invite) return redirect()->back()->withErrors(['member_email' => 'Member not found']);

        ProjectController::add_member($project_id, $to_invite->id);
        return redirect()->back()->with([['success' => 'Successfully invited member']]);
    }

    public static function post_timeline(Request $request, $project_id) {
        // Drag n drop task
        if ($request->has('task') && $request->task == 'modify') return ProjectController::move_task($request, $project_id);
        if ($request->has('task') && $request->task == 'add_timeline') return ProjectController::add_task($request, $project_id);
        return response('Request not found', 404);
    }

    public static function add_task(Request $request, $project_id) {
        // Validate request
        // dd("add_timeline");
        $request->validate([
            'timeline_name' => 'required',
            'timeline_description' => '',
            'timeline_color' => '',
            // 'start_date' => 'required',
            // 'end_date' => 'required',
        ]);

        // Model create n insert
        $timeline = new Timeline;
        $timeline->timelineTitle = $request->timeline_name;
        $timeline->timelineDesc = $request->timeline_description;
        $timeline->type = 'blue';
        // $timeline->start_date = $request->start_date;
        // $timeline->end_date = $request->end_date;
        
        $timeline->project_id = $project_id;
        $timeline->next = -2;
        $timeline->save();

        // Append ke todo terakhir
        DB::update('UPDATE timelines t set t.next = ? where t.next = ? and t.group = ? and t.project_id = ? limit 1', 
            [$timeline->id, -1, 'todo', $project_id]);

        $timeline->next = -1;
        $timeline->save();

        $timeline->refresh();

        // Broadcast
        $pusher = ProjectController::pusher();
        $pusher->trigger(
            'private-timeline.'.$project_id,
            'new_task',
            array_merge(
                $timeline->only(['id', 'timelineTitle', 'timelineDesc', 'type', 'n_task', 'completed_task']),
                ['progress' => ProjectController::update_progress($project_id)],
            )
        );
        return redirect()->back()->with('success', 'successfully created timeline');
    }

    public static function move_task(Request $request, $project_id) {
        // move : $timeline_id, $before_id, $group

        // Validasi : agak banyak buat syncing semoga ga error
        // "task" => "modify"
        //   "id" => "83"
        //   "group" => "onprogress"
        //   "before" => "81"

        // dd($request);
        
        $item = Timeline::find($request->id);
        if (!$item) return response('Item not found', 404);
        if ($item->type == 'head') return response('Item not found', 404);
        if ($item->project_id != $project_id) return response('Forbidden', 403);

        $prev = Timeline::where('next', $item->id)->first();
        if (!$prev) return response('Item not found (missing parent)');

        $parent = Timeline::find($request->before);
        if (!$parent) return response('Target has changed', 404);
        if ($parent->group != $request->group) return response('Target has changed', 404);
        if ($parent->project_id != $project_id) return response('Forbidden', 403);

        // Detach dari tempat asli
        $prev->next = $item->next;
        $prev->save();
        // Attach ke setelah before
        $item->next = $parent->next;
        $item->group = $parent->group;
        $item->save();

        $parent->next = $item->id;
        $parent->save();
        
        // Broadcast
        $timestamp = time();

        $pusher = ProjectController::pusher();
        $progress = ProjectController::update_progress($project_id);
        $pusher->trigger(
            'private-timeline.'.$project_id,
            'move_task',
            [
                'id' => $item->id,
                'target_id' => $parent->id,
                'progress' => $progress,
                'timestamp' => $timestamp,
            ]
        );

        return response([
            // 'progress' => ProjectController::update_progress($project_id),
            'timestamp' => $timestamp,

        ], 200);
    } 
    
    public static function update_progress($project_id) {
        $progress = DB::select('SELECT round(avg(if(`group`="done", 100, if(n_task=0, 0, 100*completed_task/n_task)))) as `sum` from timelines where project_id = ? and `type` != "head"', [$project_id]);
        $project = ProjectHeader::find($project_id);
        $project->projectProgress = INTVAL($progress[0]->sum);
        $project->save();
        return INTVAL($progress[0]->sum);
    }

    public static function timeline(Request $request, $project_id) {
        if ($request->has('task') && $request->task == 'get_tasks') return Timeline::select('id', 'next', 'group', 'timelineTitle', 'timelineDesc', 'type', 'n_task', 'completed_task')->where('project_id', $project_id)->get();
        
        $result = DB::select('SELECT sum(n_task) as `sum` from timelines where project_id = ?', [$project_id]);
        $completed = DB::select('SELECT sum(completed_task) as `sum` from timelines where project_id = ?', [$project_id]);
        
        return view('timeline', [
            'user' => Auth::user(),
            'project' => ProjectHeader::find($project_id),
            'n_task' => $result[0]->sum,
            'completed_task' => $completed[0]->sum,
            'progress' => ProjectController::update_progress($project_id),
        ]);
    }
}