@extends('components.layout')

@section('title', 'Listado de institucion')

@section('styles')

@endsection

@section('content')
<br>
<br>

<h1 class="titulo">Gestion De Institucion</h1>
<div style="width: 100%; padding: 3px; background-color: #FF007F "></div>


<div class="card" style="width: 100% margin-top: 48px; box-shadow: 0 0 10px rgba(0,0,0,0.08);">
    <div class="card-body">

        <a href="/gestionarInstitucion" class="btn btn-primary">+
            Nuevo institucion</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre de la institucion</th>
                    <th>Responsable de la institucion</th>
                    <th>Direccion de la institucion</th>
                    <th>Telefono de la institucion</th>
                    <th>Correo de la institucion</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instituciones as $institucion)
                <tr>
                    <td>{{ $institucion["nombre"] }}</td>
                    <td>{{ $institucion["responsable"] }}</td>
                    <td>{{ $institucion["direccion"] }}</td>
                    <td>{{ $institucion["telefono"] }}</td>
                    <td>{{ $institucion["correo"] }}</td>
                    <td class="actions">
                        <a class="btn btn-primary btn btn-edit" href="/institucion/<?= $institucion["id"] ?>">Editar</a>
                        <a class="btn btn-danger  btn btn-delete"
                            href="/gestionarInstitucion/eliminar/<?= $institucion["id"] ?>">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        </nav>
    </div>
    @endsection