<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/students', function() {
    return 'Obteniendo Lista de Estudiantes';
});

Route::get('/students/{id}', function() {
    return 'Obteniendo a Estudiante';
});

Route::post('/students', function() {
    return 'Creando Estudiante';
});


Route::put('/students/{id}', function() {
    return 'Actualizando Estudiante';
});


// Route::path('/students/{id}', function() {
//     return 'Actualizando parte de Estudiante';
// });


Route::delete('/students/{id}', function() {
    return 'Eliminando Estudiante';
});

