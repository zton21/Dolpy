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
        return back()->withErrors([
            'email' => 'Invalid credentials'
        ])->withInput();
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

        // Clear cache-control headers
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        return redirect('/login');
    }

    public function showRegister()
    {
        Auth::logout();
        return view('authentication.register');
    }
    
    public function showLogin()
    {
        Auth::logout();
        return view('authentication.login');
    }

    public function showForgotPassword()
    {
        return view('authentication.forgotpass');
    }

    public function showResetPassword()
    {
        return view('authentication.resetpass');
    }

    public function showVerify()
    {
        return view('authentication.verify');
    }
}
