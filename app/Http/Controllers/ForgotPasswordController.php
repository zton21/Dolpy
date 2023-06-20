<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function sendResetPasswordEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        session(['reset_email' => $request->email]); // Store email in session

        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        if ($status === Password::RESET_LINK_SENT) {
            return redirect()->route('verify')->with('emailSent', true);
        } else {
            return back()->withErrors(['email' => trans($status)]);
        }
    }

    public function resendResetEmail(Request $request)
    {
        $email = session('reset_email');

        $status = Password::sendResetLink(['email' => $email]);

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('emailSent', true);
        } else {
            return back()->withErrors(['email' => trans($status)]);
        }
    }

}
