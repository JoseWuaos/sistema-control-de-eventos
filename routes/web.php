<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\GestionarEncargado;
use App\Http\Controllers\GestionarParticipante;
use App\Http\Controllers\GestionarAsistencia;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/evento', [EventoController::class, 'index'])->name('eventos.index');
Route::post('/evento', [EventoController::class, 'guardar'])->name('eventos.guardar');
Route::get('/evento/gestionar', [EventoController::class, 'gestionarEvento'])->name('eventos.gestionarEvento');
Route::get('/evento/asistencia/{id}', [EventoController::class, 'asistencia'])->name('eventos.asistencia');
Route::post('/evento/asistencia', [EventoController::class, 'guardarAsistencia'])->name('eventos.guardarAsistencia');




Route::get('/encargado', [\App\Http\Controllers\EventoController::class, 'encargado']);
Route::get('/gestionarEncargado', [\App\Http\Controllers\GestionarEncargado::class, 'gestionarEncargado']);

Route::get('/participante', [\App\Http\Controllers\EventoController::class, 'participante']);
Route::get('/gestionarParticipante', [\App\Http\Controllers\GestionarParticipante::class, 'gestionarParticipante']);

Route::get('/gestionarAsistencia', [\App\Http\Controllers\GestionarAsistencia::class, 'gestionarAsistencia']);



Route::get('/layout', [\App\Http\Controllers\EventoController::class, 'layout']);