<?php

use App\Http\Controllers\JobController;
use App\Models\Postions;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', [JobController::class, 'jobs']);

Route::get('/job/{id}', function ($id) {

    $job = Postions::find( $id );
    return view('job', ['job' => $job]);
         
    });

    
   
Route::get('/contact', function (){
    return view("contact");
});