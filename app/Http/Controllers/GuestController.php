<?php

namespace App\Http\Controllers;

class GuestController extends Controller
{
    public function show()
    {
        return view('index.index');
    }

    public function faq()
    {
        return view('faq');
    }
}
