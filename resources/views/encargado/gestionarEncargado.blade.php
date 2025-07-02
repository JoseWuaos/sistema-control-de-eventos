@extends('components.layout')

@section('title', 'Agregar Encargado')

@section('content')

<br>
<br>

@include('components.title', [ 'title' => 'Gestionar Encargado'])


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


<div class="card " style="box-shadow: 0 0 10px rgba(0,0,0,0.08); ">
    <div class="card-body">
        <h2>Agregar un Encargado</h2>
        <form action="{{ route('GestionarEncargado.guardar') }}" method="POST">
            @csrf
            @if (isset($encargado))
            <input type="hidden" name="id" value="{{ $encargado->id }}">
            @endisset

            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="Cedula" class="form-label">Cédula</label>
                        <input type="number" id="cedula" name="cedula" class="form-control"
                            value="<?= isset($encargado) ? $encargado['cedula'] : '' ?>" require>
                    </div>
                    <div class="col-sm-6">
                        <label for="Nombre" class="form-label">Primer Nombre</label>
                        <input type="text" id="primer_nombre" name="primer_nombre" class="form-control"
                            value="<?= isset($encargado) ? $encargado['primer_nombre'] : '' ?>" require>
                    </div>
                    <div class="col-sm-6">
                        <label for="Segundo Nombre" class="form-label">Segundo Nombre</label>
                        <input type="text" id="segundo_nombre" name="segundo_nombre" class="form-control"
                            value="<?= isset($encargado) ? $encargado['segundo_nombre'] : '' ?>" require>
                    </div>
                    <div class="col-sm-6">
                        <label for="Primer Apellido" class="form-label">Primer Apellido</label>
                        <input type="text" id="primer_apellido" name="primer_apellido" class="form-control"
                            value="<?= isset($encargado) ? $encargado['primer_apellido'] : '' ?>" require>
                    </div>
                    <div class="col-sm-6">
                        <label for="Primer Apellido" class="form-label">Segundo Apellido</label>
                        <input type="text" id="segundo_apellido" name="segundo_apellido" class="form-control"
                            value="<?= isset($encargado) ? $encargado['segundo_apellido'] : '' ?>" require>
                    </div>
                    <div class="col-sm-6">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" id="correo" name="correo" class="form-control"
                            value="<?= isset($encargado) ? $encargado['correo'] : '' ?>" require>
                    </div>
                     <div class="col-sm-6">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="number" id="telefono" name="telefono" class="form-control"
                            value="<?= isset($encargado) ? $encargado['telefono'] : '' ?>" require>
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
                        <button class="btn btn-primary float-end mt-3">Confirmar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection