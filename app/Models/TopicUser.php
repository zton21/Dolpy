<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicUser extends Model
{
    protected $primaryKey = null;
    public $incrementing = false;

    protected $guarded = [];
    protected $table = 'topic_user';

    use HasFactory;
}
