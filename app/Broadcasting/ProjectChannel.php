<?php

namespace App\Broadcasting;

use App\Models\User;
use App\Models\ProjectHeader;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\DB;

use Illuminate\BroadCasting\Channel;
// use Illuminate\Contracts\Broadcasting\Broadcaster;
// use Illuminate\Support\Arr;


final class ProjectChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    protected $project_id;
    // protected $connectedUsers = [];
    
    public function __construct($channel)
    {
        $this->project_id = substr($channel, strpos($channel, '.') + 1);
    }

    public function __toString()
    {
        return 'project.' . $this->project_id;
    }

}
