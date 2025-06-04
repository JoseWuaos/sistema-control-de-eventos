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


Route::get('/evento', [\App\Http\Controllers\EventoController::class, 'evento']);


Route::get('/gestionarEvento', [GestionarEvento::class, 'gestionarEvento']);

Route::get('/encargado', [GestionarEncargado::class, 'index']);
Route::get('/gestionarEncargado', [GestionarEncargado::class, 'gestionarEncargado']);

Route::get('/participante', [GestionarParticipante::class, 'index'])->name('participante.index');
Route::get('/gestionarParticipante', [GestionarParticipante::class, 'gestionarParticipante'])->name('participante.gestionarParticipante');


Route::get('/gestionarAsistencia', [\App\Http\Controllers\GestionarAsistencia::class, 'gestionarAsistencia']);



Route::get('/layout', [\App\Http\Controllers\EventoController::class, 'layout']);