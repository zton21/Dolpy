<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\ProjectDetail;

class UserController extends Controller
{   
    public static function get_user_projects(String $sortby) {
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

    public static function files()
    {
        return view('files');
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


    public function member()
    {
        return view('member');
    }

    public static function calendar()
    {
        return view('calendar');
    }
}
