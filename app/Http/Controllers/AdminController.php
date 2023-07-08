<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Models\Debug;

class AdminController extends Controller
{   
    public static function error($message) {
        $debug = new Debug;
        $debug->message = $message;
        $debug->save();
    }
}
