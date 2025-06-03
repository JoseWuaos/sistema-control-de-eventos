@extends('components.layout')

@section('title', 'Listado de Eventos')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/evento.css') }}">
@endsection

@section('content')

<br>
<br>

@include('components.title', [ 'title' => 'Gestion de Eventos'])

<div class="card" style="margin-top: 48px; box-shadow: 0 0 10px rgba(0,0,0,0.08);">
    <div class="card-body">
        <h2>Lista de Eventos</h2>

        <a href="/gestionarEvento" class="btn btn-primary"
            style='position: fixed; bottom: 20px; right: 20px; z-index: 1000; padding: 10px 20px; border-radius: 5px;'>+
            Nuevo Evento
        </a>



        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha Final</th>
                    <th>Encargado</th>
                    <th>Tipo de Evento</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Feria de Ciencias</td>
                    <td>Escuela Central</td>
                    <td>2025-06-10</td>
                    <td>2025-06-12</td>
                    <td>Lucía González</td>
                    <td>Educativo</td>
                    <td class="actions">
                        <button class="btn btn-edit">Asistencia</button>
                        <button class="btn btn-edit">Editar</button>
                        <button class="btn btn-delete">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>Festival de Teatro</td>
                    <td>Teatro Municipal</td>
                    <td>2025-07-01</td>
                    <td>2025-07-03</td>
                    <td>Pedro Ruiz</td>
                    <td>Cultural</td>
                    <td class="actions">
                        <button class="btn btn-edit">Asistencia</button>
                        <button class="btn btn-edit">Editar</button>
                        <button class="btn btn-delete">Eliminar</button>

                    </td>
                </tr>
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination custom-pagination">
                <li class="page-item"><a class="page-link" href="#">Atras</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Siguente</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection