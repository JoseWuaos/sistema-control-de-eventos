@extends('components.layout')

@section('title', 'Listado de Eventos')

@section('styles')
<!--<link rel="stylesheet" href="{{ asset('css/evento.css') }}">-->
@endsection

@section('content')

       <br>
        <br>

@include('components.title', [ 'title' => 'Lista de Evento'])


<div class="card" style="width: 100% margin-top: 48px; box-shadow: 0 0 10px rgba(0,0,0,0.08);">
    <div class="card-body">
        <a href="/evento/gestionar" class="btn btn-primary"
            style='position: fixed; bottom: 20px; right: 20px; z-index: 1000; padding: 10px 20px; border-radius: 5px;'>+
            Nuevo Evento</a>




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
                @foreach ($eventos as $evento)
                <tr>
                    <td>{{$evento["nombre"] }}</td>
                    <td>{{$evento["direccion"] }}</td>
                    <td>{{$evento["fecha_inicio"] }}</td>
                    <td>{{$evento["fecha_fin"] }}</td>
                    <td>{{$evento["encargado"]["primer_nombre"] .' '. $evento["encargado"]["primer_apellido"] }}</td>
                    <td>{{$evento["tipo_de_evento"]["descripcion"] }}</td>
                    <td class="actions">
                        <a class="btn btn-success" href="/evento/asistencia/<?= $evento["id"] ?>">Asistencia</a>
                        <a class="btn btn-primary" href="/evento/<?= $evento["id"] ?>">Editar</a>
                        <a class="btn btn-danger" href="/evento/eliminar/<?= $evento["id"] ?>" >Eliminar</a>
                        <a class="btn btn-info" href="/evento/<?= $evento["id"] ?>/listadoDeAsistencia">Ver asistencia</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection