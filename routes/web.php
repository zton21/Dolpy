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
    
    Route::get('/member', 'UserController@member')->name('member');
    Route::get('/timeline', 'UserController@timeline')->name('timeline');
    Route::get('/timeline_inner', 'UserController@timeline_inner')->name('timeline_inner');
    
    Route::middleware(['web', 'auth'])->group(
        function() {
            // Berhubungan dengan User
            Route::controller(UserController::class)->group(function () {
                Route::get('/home', 'home')->name('dashboard');
                Route::get('/profile', 'profile')->name('profile');
                Route::get('/setting', 'setting')->name('setting');
                Route::get('/files', 'files')->name('files');
            });

            // Berhubungan dengan User, Project
            Route::controller(ProjectController::class)->group(function () {
                Route::post('/home', 'create_project');

                // Perlu Project Authorization
                Route::middleware(['auth.project'])->group(function() {
                    Route::get('/project/{id}', 'view_project')->name('project');
                    Route::post('/project/{id}', 'project_request_handler');
                    Route::get('/project/{id}/members', 'view_members');

                    Route::post('/pusher/auth/{id}', 'pusher_authenticate');
                });
            });
            // Route::post('/query', 'UserController@handle_ajax');
        }
    );
    
});