<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\ProjectDetail;
use App\Models\Connection;
use App\Models\TopicUser;
use Pusher\Pusher;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{   
    public static function get_user_inprogress_projects(String $sortby) {
        #SELECT h.projectName, h.projectDueDate, u.firstName FROM
        #project_headers h JOIN project_details m ON h.ID = m.project_ID AND m.role = "Creator" AND h.id IN (SELECT id FROM project_headers h JOIN project_details m ON h.id = m.project_id AND m.user_id = 1)
        #JOIN users u ON u.id = m.user_id
        $x = Auth::user()->id;
        $results = DB::select("SELECT h.projectName, h.projectDueDate, u.id AS userID, u.firstName, u.lastName, h.id, h.projectDescription, h.projectProgress, h.projectWallpaperURL FROM 
            project_headers h JOIN project_details d ON h.ID = d.project_ID AND d.role = 'Creator' 
            AND EXISTS(SELECT id FROM project_headers ph JOIN project_details pd ON ph.id = pd.project_id AND pd.user_id = ? AND h.id = ph.id) 
            JOIN users u ON u.id = d.user_id WHERE h.projectCompleted = false ORDER BY h.created_at", [$x]);
        return $results;
    }

    public static function get_user_complete_projects(String $sortby) {
        #SELECT h.projectName, h.projectDueDate, u.firstName FROM
        #project_headers h JOIN project_details m ON h.ID = m.project_ID AND m.role = "Creator" AND h.id IN (SELECT id FROM project_headers h JOIN project_details m ON h.id = m.project_id AND m.user_id = 1)
        #JOIN users u ON u.id = m.user_id
        $x = Auth::user()->id;
        $results = DB::select("SELECT h.projectName, h.projectDueDate, u.id AS userID, u.firstName, u.lastName, h.id, h.projectDescription, h.projectProgress, h.projectWallpaperURL FROM 
            project_headers h JOIN project_details d ON h.ID = d.project_ID AND d.role = 'Creator' 
            AND EXISTS(SELECT id FROM project_headers ph JOIN project_details pd ON ph.id = pd.project_id AND pd.user_id = ? AND h.id = ph.id) 
            JOIN users u ON u.id = d.user_id WHERE h.projectCompleted = true ORDER BY h.created_at", [$x]);
        return $results;
    }
    public static function appendUser($data) {
        return array_merge($data, [
            'user' => Auth::user(),
            'notifs' => DB::select('SELECT n.*, u.firstName, u.lastName, p.projectName, u.profileURL from notifications n
            LEFT JOIN users u ON n.sender_id = u.id
            LEFT JOIN project_headers p ON n.project_id = p.id
            where user_id = ?', [Auth::user()->id]),
        ]);
    }
    public static function home(Request $request)
    {
        if ($request->has('search')) return UserController::search($request);

        $uncomplete = UserController::get_user_inprogress_projects("");
        $complete = UserController::get_user_complete_projects("");

        $data = [
            'projects' => $uncomplete,
            'completed' => $complete,
        ];
        
        return view('home', UserController::appendUser($data));
    }

    public static function profile()
    {
        $data = [];
        return view('profile', UserController::appendUser($data));
    }

    public static function setting()
    {
        $data = [];
        return view('setting', UserController::appendUser($data));
    }

    public static function faq()
    {
        $data = [];
        return view('faq', UserController::appendUser($data));
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
    
    public static function calendar()
    {
        $data = [];
        return view('calendar', UserController::appendUser($data));
    }

    public function updateProfilePicture(Request $request)
    {
        $user = Auth::user();
        
        if ($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
            $file = $request->file('profile_picture');
            $extension = $file->getClientOriginalExtension();
            $filename = $user->id . '_' . time() . '.' . $extension;

            // Delete previous profile picture if exists
            if($user->profileURL !== 'profile_pictures/blankProfilePic.png') {
                Storage::disk('public')->delete($user->profileURL);
            }

            // Store the new profile picture with the specified filename
            $path = $file->storeAs('/profile_pictures', $filename, 'public');
            
            // Update the profile picture path in the database
            $user->profileURL = $path;
            $user->save();
        }

        return response()->json(['success' => true]);
    }

    public static function search(Request $request){
        $x = Auth::user()->id;
        $y = $request->search;
        $results = DB::select("SELECT h.projectName, h.projectDueDate, u.id AS userID, u.firstName, u.lastName, h.id, h.projectDescription, h.projectProgress, h.projectWallpaperURL FROM 
        project_headers h JOIN project_details d ON h.ID = d.project_ID AND d.role = 'Creator' 
        AND EXISTS(SELECT id FROM project_headers ph JOIN project_details pd ON ph.id = pd.project_id AND pd.user_id = ? AND h.id = ph.id) 
        JOIN users u ON u.id = d.user_id WHERE h.projectName LIKE ? ORDER BY h.created_at", [
            $x, 
            "%{$request->search}%"
        ]);
        
        $data = [
            'user' => Auth::user(),
            'projects' => $results,
        ];
        return view('home2',  UserController::appendUser($data));
    }

}
