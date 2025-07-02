@extends('components.layout')

@section('title', 'Listado de Eventos')

@section('styles')

@endsection

@section('content')
<br>
<br>

<h1 class="titulo">Gestion De Eventos</h1>
<div style="width: 100%; padding: 3px; background-color: #FF007F "></div>


<div class="card" style="width: 100% margin-top: 48px; box-shadow: 0 0 10px rgba(0,0,0,0.08);">
    <div class="card-body">
        <a href="/evento/gestionar" class="btn btn-primary">+
            Nuevo Evento</a>




        <table class="table">
            <thead>
                <tr>
                    <th>Nombre del evento</th>
                    <th>Dirección del evento</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha Final</th>
                    <th>Encargado del evento</th>
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