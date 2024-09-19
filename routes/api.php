<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\studentController;

Route::get('/students', [studentController::class,'index']);

Route::get('/students/{id}', [studentController::class,'getStudentById']);

Route::post('/students', [studentController::class,'store']);


Route::put('/students/{id}', function() {
    return 'Actualizando Estudiante';
});


// Route::path('/students/{id}', function() {
//     return 'Actualizando parte de Estudiante';
// });


Route::delete('/students/{id}', function() {
    return 'Eliminando Estudiante';
});

