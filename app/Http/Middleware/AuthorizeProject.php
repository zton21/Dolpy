<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ProjectHeader;
use App\Models\ProjectDetail;


class AuthorizeProject
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Kalo belom login
        if (!Auth::check()) return redirect('login');

        // Project Exist?
        $project_id = $request->route('id');
        $project = ProjectHeader::find($project_id);

        if (!$project) return response('<p>You dont have access to this project.</p><p><a href="/home">Back to project list</a></p>', 403);

        // Authorized?
        $member = ProjectDetail::where('project_id', $project_id)->where('user_id', Auth::user()->id)->first();
        if (!$member) return response('<p>You dont have access to this project.</p><p><a href="/home">Back to project list</a></p>', 403);
        if ($member->role == 'pending') return response('<p>Accept your invitation first.</p><p><a href="/home">Back to project list</a></p>', 200);
        
        // Add member role to the response
        $request->role = $member;
        return $next($request);
    }
}
