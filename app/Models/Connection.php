<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    protected $primaryKey = null;
    public $incrementing = false;

    protected $guarded = [];
    use HasFactory;
}
