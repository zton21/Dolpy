<?php

namespace App\Broadcasting;

use App\Models\User;
use App\Models\ProjectHeader;
use App\Http\Controllers\ProjectController;

use Illuminate\BroadCasting\Channel;
// use Illuminate\Contracts\Broadcasting\Broadcaster;
// use Illuminate\Support\Arr;


class ProjectChannel extends Channel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    protected $project_idd;
    
    public function __construct($channel)
    {
        $this->project_id = substr($channel, strpos($channel, '.') + 1);
        // dd($this->projectId);
        //
    }

    public function __toString()
    {
        return 'project.' . $this->project_id;
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\Models\User  $user
     * @return array|bool
     */
    public function join(User $user, $channel)
    {
        // $project_id = substr($channel, strpos($channel, '.') + 1);
        // dd($user);
        // dd($channel);
        return ProjectController::check_member($this->project_id, $user->id)->is_member;
    }
}
