<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::resource('courses', CourseController::class)->middleware('auth:sanctum');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Public route
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('/greeting', function(){
    return 'Hello from Laravel!';
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
