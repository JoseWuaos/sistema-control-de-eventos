<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\GestionarEncargado;
use App\Http\Controllers\GestionarPersonas;
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
Route::get('/evento/{id}/listadoDeAsistencia', [EventoController::class, 'listadoDeAsistencia'])->name('eventos.listadoDeAsistencia');



Route::get('/encargado', [GestionarEncargado::class, 'index'])->name('encargado.index');;
Route::get('/encargado/eliminar/{id}', [GestionarEncargado::class, 'eliminar'])->name('encargado.eliminar');
Route::get('/gestionarEncargado', [GestionarEncargado::class, 'gestionarEncargado']);
Route::get('/encargado/{id}', [GestionarEncargado::class, 'editar'])->name('encargado.editar');
Route::post('/gestionarEncargado', [GestionarEncargado::class, 'guardar'])->name('GestionarEncargado.guardar');





Route::get('/personas', [GestionarPersonas::class, 'index'])->name('personas.index');
Route::get('/gestionarPersonas', [GestionarPersonas::class, 'gestionarPersonas'])->name('personas.gestionarPersonas');
Route::post('/gestionarPersonas', [GestionarPersonas::class, 'guardar'])->name('GestionarPersonas.guardar');
Route::get('/gestionarPersonas/eliminar/{id}', [GestionarPersonas::class, 'eliminar'])->name('gestionarPersonas.eliminar');
Route::get('/personas/{id}', [GestionarPersonas::class, 'editar'])->name('gestionarPersonas.editar');

Route::get('/personas/cedula/{cedula}', [GestionarPersonas::class, 'obtenerPersonasPorCedula'])->name('personas.obtenerPersonasPorCedula');

Route::get('/layout', [EventoController::class, 'layout']);