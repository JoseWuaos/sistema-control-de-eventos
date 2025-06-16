@extends('components.layout')

@section('title', 'Listado de Participates')

@section('styles')

@endsection

@section('content')


<br>
<br>
@include('components.title', [ 'title' => 'Gestionar personas'])
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
<div class="card " style="box-shadow: 0 0 10px rgba(0,0,0,0.08);">
    <div class="card-body">
        <h2>Agregar un personas</h2>

        <form action="/gestionarPersonas" method="post">

            @csrf
            @if (isset($personas))
            <input type="hidden" name="id" value="<?= $personas['id'] ?>">
            @endif
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="Cedula" class="form-label">Cedula</label>
                        <input type="text" id="cedula" name="cedula" class="form-control"
                            value="<?= isset($personas) ? $personas['cedula'] : '' ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="Nombre" class="form-label">Primer Nombre</label>
                        <input type="text" id="primer_nombre" name="primer_nombre" class="form-control"
                            value="<?= isset($personas) ? $personas['primer_nombre'] : '' ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="Direccion" class="form-label">Segundo Nombre</label>
                        <input type="text" id="segundo_nombre" name="segundo_nombre" class="form-control"
                            value="<?= isset($personas) ? $personas['segundo_nombre'] : '' ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="Fecha inicio" class="form-label">Primer Apellido</label>
                        <input type="text" id="primer_apellido" name="primer_apellido" class="form-control"
                            value="<?= isset($personas) ? $personas['primer_apellido'] : '' ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="Fecha final" class="form-label">Segundo Apellido</label>
                        <input type="text" id="segundo_apellido" name="segundo_apellido" class="form-control"
                            value="<?= isset($personas) ? $personas['segundo_apellido'] : '' ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="Fecha_nacimiento" class="form-label">Fecha nacimiento</label>
                        <input type="date" id="Fecha_nacimiento" name="fecha_nacimiento" class="form-control"
                            value="<?= isset($personas) ? $personas['fecha_nacimiento']->format('Y-m-d') : ''  ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="Genero" class="form-label">Genero</label>
                        <select id="genero" name="genero_id" class="form-select">
                            <option value="" default> </option>
                            @foreach ($generos as $genero)
                            @if( isset($personas['genero_id']) && $genero['id'] == $personas['genero_id'])
                            <option selected='true' value="<?= $genero['id']?>">
                                <?= $genero['descripcion'] ?></option>
                            @else
                            <option value="<?= $genero['id']?>">
                                <?= $genero['descripcion']?></option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 ">
                        <button class="btn btn-primary float-end mt-3" type="submit">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection