<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TopicSection;
use App\Models\FileSection;

class ProjectHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'projectName',
        'projectDescription',
        'projectDueDate',
        'projectStatus',
        
    ];

    public function topics(): HasMany
    {
        return $this->hasMany(TopicSection::class, 'foreign_key', 'local_key');
    }

    public function files(): HasMany
    {
        return $this->hasMany(FileSection::class, 'foreign_key', 'local_key');
    }
}
