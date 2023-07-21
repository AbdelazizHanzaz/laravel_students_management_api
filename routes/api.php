<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Authentication
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']); 

Route::middleware('auth:sanctum')->group(function(){

    // Students 
Route::resource('/students', StudentController::class);

// Courses
Route::resource('/courses', CourseController::class);

// Enrollments
Route::post('/enroll', [EnrollmentController::class, 'enroll']);
    
  });

