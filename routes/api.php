<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\studentController;

Route::get('/students', [studentController::class,'getAll']);

Route::get('/students/{id}', [studentController::class,'getStudentById']);

Route::post('/students', [studentController::class,'create']);


Route::put('/students/{id}', function() {
    return 'Actualizando Estudiante';
});


// Route::path('/students/{id}', function() {
//     return 'Actualizando parte de Estudiante';
// });


Route::delete('/students/{id}', [studentController::class,'deleteStudentById']);

