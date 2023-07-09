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
        // Project Exist?
        $project_id = $request->route('id');
        $project = ProjectHeader::find($project_id);

        if (!$project) return response('You dont have access to this project. (Do you think IDOR can work? Ahahaha)', 403);

        // Authorized?
        $member = ProjectDetail::where('project_id', $project_id)->where('user_id', Auth::user()->id)->first();
        if (!$member) return response('You dont have access to this project.', 403);
        if ($member->role == 'pending') return response('Please check your email and accept the project invitation.', 200);
        
        // Add member role to the response
        $request->role = $member;
        return $next($request);
    }
}
