    @extends('components.layout')

    @section('title', 'Listado de encargados')

    @section('styles')

    @endsection

    @section('content')

    <br>
    <br>

    {{-- **** INICIO DEL BLOQUE PARA MOSTRAR ERRORES DE VALIDACIÓN **** --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{-- **** FIN DEL BLOQUE PARA MOSTRAR ERRORES DE VALIDACIÓN **** --}}

    <h1 class="titulo">Gestion de Encargado</h1>
    <div style="width: 100%; padding: 3px; background-color: #FF007F ">

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
                        <th>Cedula</th>
                        <th>Primer Nombre</th>
                        <th>Segundo Nombre</th>
                        <th>Primer Apellido</th>
                        <th>Segundo Apellido</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Genero</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>

                    

                    @foreach($encargados as $encargado)
                    <tr>
                    <td>{{ $encargado["cedula"] }}</td>
                    <td>{{ $encargado["primer_nombre"] }}</td>
                    <td>{{ $encargado["segundo_nombre"] }}</td>
                    <td>{{ $encargado["primer_apellido"] }}</td>
                    <td>{{ $encargado["segundo_apellido"] }}</td>  
                    <td>{{ $encargado["correo"] }}</td> 
                    <td>{{ $encargado["telefono"] }}</td>               
                    <td>{{ $encargado->genero->descripcion }}</td>
                        <td class="actions">
                            <a href="{{ route('encargado.editar', $encargado->id) }}" class="btn btn btn-primary">Editar</a>
                            <a href="{{ route('encargado.eliminar', $encargado->id) }}"class="btn btn-danger">Eliminar</a>
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
                    <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                </ul>
            </nav>
        </div>
        @endsection