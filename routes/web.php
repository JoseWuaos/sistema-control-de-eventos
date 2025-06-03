<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\GestionarEvento;
use App\Http\Controllers\GestionarEncargado;
use App\Http\Controllers\GestionarParticipante;
use App\Http\Controllers\GestionarAsistencia;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', [\App\Http\Controllers\EventoController::class, 'menu']);

Route::get('/evento', [\App\Http\Controllers\EventoController::class, 'evento']);
Route::get('/gestionarEvento', [\App\Http\Controllers\GestionarEvento::class, 'gestionarEvento']);

Route::get('/encargado', [\App\Http\Controllers\EventoController::class, 'encargado']);
Route::get('/gestionarEncargado', [\App\Http\Controllers\GestionarEncargado::class, 'gestionarEncargado']);

Route::get('/participante', [\App\Http\Controllers\EventoController::class, 'participante']);
Route::get('/gestionarParticipante', [\App\Http\Controllers\GestionarParticipante::class, 'gestionarParticipante']);

Route::get('/gestionarAsistencia', [\App\Http\Controllers\GestionarAsistencia::class, 'gestionarAsistencia']);



Route::get('/layout', [\App\Http\Controllers\EventoController::class, 'layout']);