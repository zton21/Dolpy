<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');  
        // $credentials['password'] = Hash::make($credentials['password']);      
        // Login 
        $login = Auth::attempt($credentials);
        if ($login) {
            return redirect()->intended('home');
        }
        // Salah
        echo("SALAHH WOI");
        return back()->withErrors([
            'username' => $credentials['password']
        ]);
    }

    public function register(Request $request) {

        // Input Validasi
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users|max:255',
            'name' => 'required|max:20',
            'name2' => 'required|max:20',
            'phone' => 'required|numeric|digits:8',
            'password' => 'required|min:8',
        ]);

        // Create user (from model)
        $user = User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'name' => $validatedData['name'],
            'name2' => $validatedData['name2'],
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
