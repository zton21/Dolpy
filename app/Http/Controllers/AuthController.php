<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        // Cek username = email/username
        $field = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$field => $request->input('username')]);
        $credentials = $request->only($field, 'password');
        
        // Login attempt
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        // Salah
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request) {
        // Input Validasi
        $validatedData = $request->validate([
            'username' => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users|max:255',
            'name' => 'required|max:255',
            'password' => 'required|min:8',
        ]);
        
        // Create user (from model)
        $user = User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'name' => $validatedData['name'],
            'password' => Hash::make($validatedData['password']),
        ]);
        
        // Langsung kelogin setelah keregister, lalu keredirect ke home
        Auth::login($user);
        return redirect('/home');
    }

    public function logout() {
        // Display message gini kah?
        session()->flash('message', 'You have been logged out.');
    
        // Logout 
        Auth::logout();
        return redirect('/login');
    }

    public function showRegister()
    {
        return view('register');
    }
    
    public function showLogin()
    {
        return view('login');
    }
}
