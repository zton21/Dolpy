<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function showResetPassword(Request $request)
    {
        $token = $request->query('token');
        $email = $request->query('email');

        return view('authentication.resetpass')->with(
            ['token' => $token, 'email' => $email]
        );
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ], [
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        $status = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->save();
        });

        // $request->validate($this->rules(), $this->validationErrorMessages());

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login');
        } else {
            return back()->withErrors(['email' => trans($status)]);
        }
    }
}
