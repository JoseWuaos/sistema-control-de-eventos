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



Route::get('/encargado', [GestionarEncargado::class, 'index'])->name('encargado.index');;
Route::get('/encargado/eliminar/{id}', [GestionarEncargado::class, 'eliminar'])->name('encargado.eliminar');
Route::get('/gestionarEncargado', [GestionarEncargado::class, 'gestionarEncargado']);
Route::get('/encargado/{id}', [GestionarEncargado::class, 'editar'])->name('encargado.editar');
Route::post('/gestionarEncargado', [GestionarEncargado::class, 'guardar'])->name('GestionarEncargado.guardar');





Route::get('/participante', [GestionarParticipante::class, 'index'])->name('participante.index');
Route::get('/gestionarParticipante', [GestionarParticipante::class, 'gestionarParticipante'])->name('participante.gestionarParticipante');


Route::get('/gestionarAsistencia', [\App\Http\Controllers\GestionarAsistencia::class, 'gestionarAsistencia']);



Route::get('/layout', [\App\Http\Controllers\EventoController::class, 'layout']);