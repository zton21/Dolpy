<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Model\User;

class ProjectDetail extends Model
{
    use HasFactory;

    protected $primaryKey = null;
    public $incrementing = false;
    
    protected $guarded = [];

    // public function user() {
    //     return $this->belongsToMany(User::class);
    // }
}
