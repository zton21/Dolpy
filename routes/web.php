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

    Route::get('/calendar', 'UserController@calendar')->name('calendar');
<<<<<<< HEAD
    
    Route::get('/member', 'UserController@member')->name('member');
    Route::get('/member', 'UserController@member')->name('member');
    
=======
    //
>>>>>>> f1441de44a9c0adef62cb6deb90ccb20e5a6bd2a
    Route::middleware(['web', 'auth'])->group(
        function() {
            // Route that need auth
            Route::get('/home', 'UserController@home')->name('dashboard');
            Route::get('/profile', 'UserController@profile')->name('profile');
            Route::get('/setting', 'UserController@setting')->name('setting');
            Route::get('/files', 'UserController@files')->name('files');

            Route::post('/home', 'ProjectController@create_project');
            Route::get('/project/{id}', 'ProjectController@view_project')->name('project');
            Route::post('/project/{id}', 'ProjectController@project_request_handler');
            Route::post('/check_for_update', 'CommentController@check_for_update');
            Route::post('/request_messages', 'CommentController@update_message_handler');
        }
    );
});