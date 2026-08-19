<?php

use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MedicalStaffController;
use App\Http\Controllers\RegisteredUsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Models\Postion;
use Illuminate\Support\Facades\Route;


// Home
Route::get('/', function () {
    return view('home');
});

//  Route::resource('jobs',JobController::class)->only('')->middleware('auth');
Route::get('medical-staff', [MedicalStaffController::class,'index']); 

// Authenticated routes
Route::middleware('auth')->group(function () {
        Route::get('/medical-staff', [MedicalStaffController::class, 'index']);


    // Jobs
    Route::get('/jobs', [JobController::class, 'jobs']);

    Route::get('/jobs/show/{id}', function ($id) {
        $job = Postion::find($id);

        return view('jobs.show', ['job' => $job]);
    });

    Route::get('profile', [ProfileController::class,'index']);
    Route::put('profile', [ProfileController::class,'store']);

    Route::get('/jobs/create', [JobController::class, 'create']);

    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->can('edit-job,job');

    Route::post('/jobs', [JobController::class, 'store']);

    Route::put('/jobs/{job}', [JobController::class, 'update'])
    ->can('edit-job,job');;

    Route::delete('/jobs/{job}', [JobController::class, 'delete'])
    ->can('edit-job,job');;

    // Logout
    Route::post('/logout', [SessionController::class, 'destroy']);
 });


// Guest routes
Route::middleware('guest')->group(function () {

    // Login
    // Login
Route::get('/login', [SessionController::class, 'login'])
    ->name('login');

    Route::post('/login', [SessionController::class, 'SignIn'])
        ->middleware('throttle:5,1');

    // Register
    Route::get('/register', [RegisteredUsersController::class, 'create']);

    Route::post('/register', [RegisteredUsersController::class, 'store'])
        ->middleware('throttle:5,1');
});


// Forgot password
Route::get('/forget-password', [ForgetPasswordController::class, 'create']);

Route::post('/forget-password', [ForgetPasswordController::class, 'store'])
    ->middleware('throttle:5,1');


// Reset password
Route::get('/reset-password', [ForgetPasswordController::class, 'reset']);

Route::put('/reset-password', [ForgetPasswordController::class, 'update']);


// Contact
Route::get('/contact', function () {
    return view('contact');
});