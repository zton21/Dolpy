<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
            'firstName' => 'required|max:20',
            'lastName' => 'required|max:20',
            'email' => 'required|email|unique:users|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
            'password' => 'required|min:8',
        ]);
        // Create user (from model)
        $user = User::create([
            'firstName' => $validatedData['firstName'],
            'lastName' => $validatedData['lastName'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
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
        return redirect('/index');
    }

    public function showRegister()
    {
        Auth::logout();
        return view('register');
    }
    
    public function showLogin()
    {
        Auth::logout();
        return view('login');
    }
    public function forgotPassword()
    {
        return view('forgotpass');
    }
    public function resetPassword()
    {
        return view('resetpass');
    }
}
