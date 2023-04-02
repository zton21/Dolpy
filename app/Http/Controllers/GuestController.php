<?php

namespace App\Http\Controllers;

class GuestController extends Controller
{
    public function show()
    {
        return view('index');
    }
    public function showPricing()
    {
        return view('pricing');
    }
    public function showFeature()
    {
        return view('feature');
    }
    public function showAbout()
    {
        return view('about');
    }
    public function showSolution()
    {
        return view('solution');
    }
}
