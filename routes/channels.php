<?php

use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

// Broadcast::channel('project.{project_id}', function(Request $request, User $user, $project_id) {
//     // if (!Auth::user()) return false; # belom login
//     if (Auth::user()->id != $user->id) return false;
//     dd($project_id);
//     $user = Auth::user();
//     $channel_id = $request->channel_name;
//     $socket_id = $request->socket_id;
//     if (!ProjectController::check_member($project_id, $user_id)->is_member) return false; # bukan member

    
// }); 

