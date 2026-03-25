<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\FacultadController;
use App\Http\Controllers\TurnoController;

// Ruta pública
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    //Route::get('/me',      [AuthController::class, 'me']);

    Route::apiResource('estudiantes', EstudianteController::class);
    Route::apiResource('carreras',    CarreraController::class);
    Route::apiResource('facultades',  FacultadController::class);
    Route::apiResource('turnos',      TurnoController::class);
});
