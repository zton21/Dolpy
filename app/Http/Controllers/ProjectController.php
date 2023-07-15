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
        $pusher = pusher();
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

        dd(\DB::getQueryLog());
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
        if ($request->has('topic')) {
            return ProjectController::create_topic($request, $id);
        }
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

        // Broadcast
        $pusher = ProjectController::pusher();
        // $pusher->trigger(
        //     'private-timeline.'.$project_id,
        //     'new_task',
        //     [
        //         'timeline' => $timeline->only(''),
        //         'project_id' => $project_id,
        //     ]
        // );

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
        
        return response('success', 200);
    } 
    
    public static function timeline(Request $request, $project_id) {
        if ($request->has('task') && $request->task == 'get_tasks') return Timeline::select('id', 'next', 'group', 'timelineTitle', 'timelineDesc', 'type', 'n_task', 'completed_task')->where('project_id', $project_id)->get();
        return view('timeline', [
            'user' => Auth::user(),
            'project' => ProjectHeader::find($project_id),
        ]);
    }



}