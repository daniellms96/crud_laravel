<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController; //Se importa el controlador AlumnoController.


//Se define la ruta para el recurso alumnos.
Route::resource('/alumnos', AlumnoController::class);

//Se define la ruta para mostrar la lista de alumnos.
Route::get('alumnos/create', [AlumnoController::class, 'create']);
Route::get('alumnos', [AlumnoController::class, 'index']);
Route::get('/{alumno}', [AlumnoController::class, 'show']);
Route::post('alumnos', [AlumnoController::class, 'store']);
Route::get('alumnos/{id}/edit', [AlumnoController::class, 'edit']);
Route::put('alumnos/{id}', [AlumnoController::class, 'update']);
Route::delete('alumnos/{id}', [AlumnoController::class, 'destroy']);