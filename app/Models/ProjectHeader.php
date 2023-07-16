<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TopicSection;
use App\Models\FileSection;

class ProjectHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'projectName',
        'projectDescription',
        'projectDueDate',
    ];
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'project_details', 'project_id', 'user_id')
            ->withPivot('role')
            ->withTimestamps();
    }

    public function topics(): HasMany
    {
        return $this->hasMany(TopicSection::class, 'foreign_key', 'local_key');
    }

    public function files(): HasMany
    {
        return $this->hasMany(FileSection::class, 'foreign_key', 'local_key');
    }
}
