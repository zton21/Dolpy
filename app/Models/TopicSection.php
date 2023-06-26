<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ProjectHeader;

class TopicSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'topicName',
        'topicDate',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(ProjectHeader::class);
    }
}
