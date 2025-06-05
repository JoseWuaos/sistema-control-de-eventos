@extends('components.layout')

@section('title', 'Listado de Eventos')

@section('styles')

@endsection

@section('content')

<br>
<br>

<h1 class="titulo">Gestion de Encargado</h1>
<div style="width: 100%; padding: 3px; background-color: blue ">

</div>
<div class="card" style="width: 100% margin-top: 48px; box-shadow: 0 0 10px rgba(0,0,0,0.08);">
    <div class="card-body">
        <h2>Lista de Encargado</h2>

        <a href="/gestionarEncargado" class="btn btn-primary"
            style='position: fixed; bottom: 20px; right: 20px; z-index: 1000; padding: 10px 20px; border-radius: 5px;'>+
            Nuevo Encargado</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Primer Nombre</th>
                    <th>Segundo Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Genero</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                
                @if(isset($encargados) && $encargados->count() > 0)
                @foreach($encargados as $encargado) {{-- <-- ¡Añade esta línea! --}}
                <tr>
                    {{-- Ahora puedes acceder a $encargado (singular) dentro del bucle --}}
                    <td>{{ $encargado["primer_nombre"] }}</td>
                    <td>{{ $encargado["segundo_nombre"] }}</td>
                    <td>{{ $encargado["primer_apellido"] }}</td>
                    <td>{{ $encargado["segundo_apellido"] }}</td>
                    <td>{{ $encargado->genero->descripcion ?? '' }}</td>
                    <td class="actions">
                        <button class="btn btn-primary btn btn-edit">Editar</button>
                        <button class="btn btn-danger btn btn-delete">Eliminar</button>
                    </td>
                </tr>
                @endforeach {{-- <-- ¡Añade esta línea! --}}
                @else
                <tr>
                    <td colspan="7">No hay encargados registrados.</td> {{-- Mensaje si no hay encargados --}}
                </tr>
                @endif
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination custom-pagination">
                <li class="page-item"><a class="page-link" href="#">Atras</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
            </ul>
        </nav>
    </div>
    @endsection