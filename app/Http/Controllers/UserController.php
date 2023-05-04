<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{   
    public function home()
    {
        $data = [
            'user' => Auth::user(),
        ];
        return view('home', $data);
    }
}
