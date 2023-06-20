<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


/*a
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::namespace('App\Http\Controllers')->group(function() {
    Route::get('/', 'GuestController@show');
    Route::get('/index', 'GuestController@show')->name('index');
    // Route::get('/feature', 'GuestController@showFeature')->name('feature');
    // Route::get('/about', 'GuestController@showAbout')->name('about');
    // Route::get('/pricing', 'GuestController@showPricing')->name('pricing');
    // Route::get('/solution', 'GuestController@showSolution')->name('solution');
    // Route::get('/faq', 'GuestController@FAQ')->name('faq');

    Route::get('/login', 'AuthController@showLogin')->name('login');
    Route::post('/login', 'AuthController@login');

    Route::get('/register', 'AuthController@showRegister')->name('register');
    Route::post('/register', 'AuthController@register');

    Route::get('/forgotpassword', 'AuthController@showForgotPassword')->name('forgotpassword');
    Route::post('/forgotpassword', 'ForgotPasswordController@sendResetPasswordEmail');

    Route::get('/verify', 'AuthController@showVerify')->name('verify');
    Route::post('/resend-reset-email', 'ForgotPasswordController@resendResetEmail')->name('resendResetEmail');

    
    Route::get('/resetpassword', 'ResetPasswordController@showResetPassword')->name('password.reset');
    Route::post('/resetpassword', 'ResetPasswordController@reset')->name('password.update');

    Route::middleware(['web', 'auth'])->group(
        function() {
            // Route that need auth
            Route::get('/home', 'UserController@home')->name('dashboard');
            Route::get('/profile', 'UserController@profile')->name('profile');
            Route::get('/topic', 'UserController@topic')->name('topic');
            Route::get('/setting', 'UserController@setting')->name('setting');
            Route::get('/files', 'UserController@files')->name('files');
        }
    );
});