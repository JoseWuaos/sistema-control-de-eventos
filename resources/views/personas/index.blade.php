@extends('components.layout')

@section('title', 'Listado de Personas')

@section('styles')

@endsection

@section('content')
<br>
<br>

<h1 class="titulo">Gestion De Personas</h1>
<div style="width: 100%; padding: 3px; background-color: #FF007F "></div>


<div class="card" style="width: 100% margin-top: 48px; box-shadow: 0 0 10px rgba(0,0,0,0.08);">
    <div class="card-body">
        

        <a href="/gestionarPersonas" class="btn btn-primary">+
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
          
        </nav>
    </div>
    @endsection