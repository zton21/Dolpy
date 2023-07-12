<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Support\Facades\Broadcast;


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
    Route::get('/test', 'UserController@test')->name('test');
    
    Route::middleware(['web', 'auth'])->group(
        function() {
            Route::get('/logout', 'AuthController@logout')->middleware('auth.logout')->name('logout');

            // Berhubungan dengan User
            Route::controller(UserController::class)->group(function () {
                Route::get('/home', 'home')->name('dashboard');
                Route::get('/profile', 'profile')->name('profile');
                Route::get('/setting', 'setting')->name('setting');
                Route::get('/faq', 'faq')->name('faq');
            });

            // Berhubungan dengan User, Project
            Route::controller(ProjectController::class)->group(function () {
                Route::post('/home', 'create_project');
                Route::post('/pusher/auth/{id}', 'pusher_authenticate');

                // Perlu Project Authorization
                Route::middleware(['auth.project'])->group(function() {
                    // Chat
                    Route::get('/project/{id}', 'ProjectController@view_project')->name('project');
                    Route::post('/project/{id}', 'ProjectController@chat_request_handler');
                    Route::post('/pusher/auth/{id}', 'ProjectController@pusher_authenticate');
                    
                    // Files
                    Route::get('/project/{id}/files', 'ProjectController@files')->name('files');

                    // Member
                    Route::get('/project/{id}/member', 'ProjectController@member')->name('member');
                    Route::post('/project/{id}/member', 'ProjectController@member_request_handler')->name('member');

                    // Timeline
                    Route::get('/project/{id}/timeline', 'ProjectController@timeline')->name('timeline');
                    Route::get('/project/{id}/timeline/1/timeline_inner', 'ProjectController@timeline_inner')->name('timeline_inner');
                });
            });
        }
    );
    
});