<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\studentController;

Route::get('/students', [studentController::class,'getAll']);

Route::get('/students/{id}', [studentController::class,'getStudentById']);

Route::post('/students', [studentController::class,'create']);


Route::put('/students/{id}', [studentController::class, 'updateStudent']);


Route::patch('/students/{id}', [studentController::class,'updateStudentPartial']);


Route::delete('/students/{id}', [studentController::class,'deleteStudentById']);

