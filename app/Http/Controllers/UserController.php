<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\ProjectDetail;
use App\Models\Connection;
use App\Models\TopicUser;
use Pusher\Pusher;

class UserController extends Controller
{   
    public static function get_user_projects(String $sortby) {
        #SELECT h.projectName, h.projectDueDate, u.firstName FROM
        #project_headers h JOIN project_details m ON h.ID = m.project_ID AND m.role = "Creator" AND h.id IN (SELECT id FROM project_headers h JOIN project_details m ON h.id = m.project_id AND m.user_id = 1)
        #JOIN users u ON u.id = m.user_id
        $x = Auth::user()->id;
        $results = DB::select("SELECT h.projectName, h.projectDueDate, u.firstName, h.id FROM 
            project_headers h JOIN project_details d ON h.ID = d.project_ID AND d.role = 'Creator' 
            AND EXISTS(SELECT id FROM project_headers ph JOIN project_details pd ON ph.id = pd.project_id AND pd.user_id = ? AND h.id = ph.id) 
            JOIN users u ON u.id = d.user_id ORDER BY h.created_at", [$x]);
        return $results;
    }

    public static function home()
    {
        $userProjects = UserController::get_user_projects("");

        $data = [
            'user' => Auth::user(),
            'projects' => $userProjects,
            'completed' => [],
        ];
        
        return view('home', $data);
    }

    public static function profile()
    {
        $data = [
            'user' => Auth::user(),
        ];
        return view('profile', $data);
    }

    public static function setting()
    {
        $data = [
            'user' => Auth::user(),
        ];
        return view('setting', $data);
    }

    // Join Project sebagai member
    public static function join_project($project_id, $user_id) {
        $ProjectDetail = ProjectDetail::where('project_id', $project_id)->where('user_id', $user_id)->first();        
        if (!empty($data)) { 
            return redirect()->back()->withErrors(['error' => 'Already joined the Project'])->withInput();
        }
        else {
            ProjectController::add_member($project_id, $user_id);
        }
        return redirect('home');
    }

    // Leave Project
    public static function leave_project($project_id) {
        $user_id = Auth::user()->id;
        $ProjectDetail = ProjectDetail::where('project_id', $project_id)->where('user_id', $user_id);
        ProjectController::remove_member($project_id, $user_id);
    }

    public static function pusher_authenticate(Request $request) {
        $project_id = substr($request->channel_name, strpos($request->channel_name, '.') + 1);
        // $result = Connection::where('socket_id', $request->socket_id)
        //     ->where('user_id', Auth::user()->id)->first();
        // if (!$result) {
        //     $conn = new Connection;
        //     $conn->socket_id = $request->socket_id;
        //     $conn->user_id = Auth::user()->id;
        //     $conn->save();
        // }

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
    
    public static function read_all($user_id, $topic_id) {
        $topicuser = TopicUser::where('user_id', $user_id)->where('topic_id', $topic_id)->first();
        if (!topicuser) {
            $topicuser = new TopicUser;
            $topicuser->user_id = $user_id;
            $topicuser->topic_id = $topic_id;
        }
        
    }
}
