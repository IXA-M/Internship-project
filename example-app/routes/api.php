<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\JobApiController;

Route::get('/jobs', [JobApiController::class, 'jobs']);
Route::post('/jobs', [JobApiController::class, 'store']);
Route::get('/jobs/{job}', [JobApiController::class, 'show']);
Route::get('/show/{job}', [JobApiController::class, 'show']);
Route::put('/jobs/{job}', [JobApiController::class, 'update']);
Route::delete('/jobs/{job}', [JobApiController::class, 'delete']);