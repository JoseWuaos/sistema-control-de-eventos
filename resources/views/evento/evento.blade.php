@extends('components.layout')

@section('title', 'Listado de Eventos')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/evento.css') }}">
@endsection

@section('content')

       <br>
        <br>

          <h1 class="titulo">Gestion de Eventos</h1>
<div style="width: 100%; padding: 3px; background-color: blue ">

</div>
<div class="card" style="width: 100% margin-top: 48px; box-shadow: 0 0 10px rgba(0,0,0,0.08);">
    <div class="card-body">
        <h2>Lista de Evento</h2>

        <a href="/gestionarEvento" class="btn btn-primary"
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
                        <button class="btn btn-success ">Asistencia</button>
                        <button class="btn btn-primary btn btn-edit">Editar</button>
                        <button class="btn btn-danger btn btn-delete">Eliminar</button>
                    </td>
                </tr>
                @endforeach
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