<?php

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('students', [StudentController::class, 'index']);
Route::post('students', [StudentController::class, 'store']);
Route::get('students/{id}', [StudentController::class, 'show']);
Route::patch('students/{id}', [StudentController::class, 'update']);


Route::get('api/subjects', [SubjectController::class, 'index']);
Route::post('api/subjects', [SubjectController::class, 'store']);
Route::get('api/subjects/{id}', [SubjectController::class, 'show']);
Route::put('api/subjects/{id}', [SubjectController::class, 'update']);