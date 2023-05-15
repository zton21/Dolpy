<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use app\Models\ProjectHeader;


class UserController extends Controller
{   
    public function getProjects(String $sortby) {
        #SELECT h.projectName, h.projectDueDate, u.firstName FROM
        #project_headers h JOIN project_details m ON h.ID = m.project_ID AND m.role = "Creator" AND h.id IN (SELECT id FROM project_headers h JOIN project_details m ON h.id = m.project_id AND m.user_id = 1)
        #JOIN users u ON u.id = m.user_id
        $x = Auth::user()->id;
        $results = DB::select("SELECT h.projectName, h.projectDueDate, u.firstName FROM 
            project_headers h JOIN project_details m ON h.ID = m.project_ID AND m.role = 'Creator' 
            AND h.id IN (SELECT id FROM project_headers h JOIN project_details m ON h.id = m.project_id AND m.user_id = :user_id) 
            JOIN users u ON u.id = m.user_id", ["user_id" => $x]);
        return $results;
    }

    public function home()
    {
        $userProjects = UserController::getProjects("");
        $data = [
            'user' => Auth::user(),
            'projects' => $userProjects,
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
}
