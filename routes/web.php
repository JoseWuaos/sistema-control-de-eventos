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
Route::get('/evento/eliminar/{id}', [EventoController::class, 'eliminar'])->name('eventos.eliminar');
Route::get('/evento/{id}', [EventoController::class, 'editar'])->name('eventos.editar');

Route::get('/gestionarAsistencia', [GestionarAsistencia::class, 'gestionarAsistencia']);
Route::get('/gestionarEvento', [GestionarEvento::class, 'gestionarEvento']);


Route::get('/encargado', [GestionarEncargado::class, 'index']);
Route::get('/gestionarEncargado', [GestionarEncargado::class, 'gestionarEncargado']);

Route::get('/participante', [GestionarParticipante::class, 'index'])->name('participante.index');
Route::get('/gestionarParticipante', [GestionarParticipante::class, 'gestionarParticipante'])->name('participante.gestionarParticipante');
Route::post('/gestionarParticipante', [GestionarParticipante::class, 'guardar'])->name('GestionarParticipante.guardar');
Route::get('/gestionarParticipante/eliminar/{id}', [GestionarParticipante::class, 'eliminar'])->name('gestionarParticipante.eliminar');
Route::get('/participante/{id}', [GestionarParticipante::class, 'editar'])->name('gestionarParticipante.editar');

Route::get('/participante/cedula/{cedula}', [GestionarParticipante::class, 'obtenerParticipantePorCedula'])->name('participante.obtenerParticipantePorCedula');

Route::get('/layout', [EventoController::class, 'layout']);