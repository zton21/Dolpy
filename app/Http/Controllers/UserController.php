<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\ProjectHeader;
use App\Models\ProjectDetail;
use App\Models\TopicSection;

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
            JOIN users u ON u.id = m.user_id", ["user_id" => $x]);
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

    public function project($id) {

        $result = DB::select(
            "SELECT t.*, u.firstName, c.chatContent FROM topic_sections t
            JOIN users u ON t.user_id = u.id
            LEFT JOIN comments c ON t.last_comment_id = c.id
            WHERE t.project_id = :project_id"
        , ["project_id" => $id]);
        // dd($result);
        return view('topic', [
            'user' => Auth::user(),
            'project' => ProjectHeader::find($id),
            'topics' => $result,
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
        // Check udah join belom
        // $data = DB::table('project_details')
        //     ->where('user_id', $user_id)
        //     ->where('project_id', $project_id)
        //     ->first();
        
        // if (empty($data)) {
        //     return redirect()->back();
        // }
        // else {
        // }

        // Cek kalo udah gaada member, delete project
    }
}
