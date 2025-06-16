@extends('components.layout')

@section('title', 'Listado de Personas')

@section('styles')

@endsection

@section('content')
<br>
<br>

<h1 class="titulo">Gestion de Personas</h1>
<div style="width: 100%; padding: 3px; background-color: #FF007F "></div>


<div class="card" style="width: 100% margin-top: 48px; box-shadow: 0 0 10px rgba(0,0,0,0.08);">
    <div class="card-body">
        <h2>Lista de Personas</h2>

        <a href="/gestionarPersonas" class="btn btn-primary"
            style='position: fixed; bottom: 20px; right: 20px; z-index: 1000; padding: 10px 20px; border-radius: 5px;'>+
            Nuevo Personas</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Primer Nombre</th>
                    <th>Segundo Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Genero</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personas as $personas)
                <tr>
                    <td>{{ $personas["cedula"] }}</td>
                    <td>{{ $personas["primer_nombre"] }}</td>
                    <td>{{ $personas["segundo_nombre"] }}</td>
                    <td>{{ $personas["primer_apellido"] }}</td>
                    <td>{{ $personas["segundo_apellido"] }}</td>      
                    <td>{{ $personas->fecha_nacimiento->format('d-m-Y')  }}</td>                  
                    <td>{{ $personas->genero->descripcion }}</td>
                    <td class="actions">
                        <a class="btn btn-primary btn btn-edit" href="/personas/<?= $personas["id"] ?>">Editar</a>
                       <a class="btn btn-danger  btn btn-delete" href="/gestionarPersonas/eliminar/<?= $personas["id"] ?>">Eliminar</a>
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
    @endsection