<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'topicName',
        'topicDate',
    ];
}