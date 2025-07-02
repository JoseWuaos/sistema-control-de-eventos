@extends('components.layout')

@section('title', 'Agregar Institucion')

@section('content')

<br>
<br>

@include('components.title', [ 'title' => 'Gestionar Institucion'])


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
        <h2>Agregar un Institucion</h2>
        <form action="{{ route('GestionarInstitucion.guardar') }}" method="POST">
            @csrf
            @if (isset($institucion))
            <input type="hidden" name="id" value="{{ $institucion->id }}">
            @endisset

            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="nombre" class="form-label">Nombre de la institucion</label>
                        <input type="text" id="nombre" name="nombre" class="form-control"
                            value="<?= isset($institucion) ? $institucion['nombre'] : '' ?>" require>
                    </div>
                    <div class="col-sm-6">
                        <label for="responsable" class="form-label">Responsable de la institucion</label>
                        <input type="text" id="responsable" name="responsable" class="form-control"
                            value="<?= isset($institucion) ? $institucion['responsable'] : '' ?>" require>
                    </div>
                    <div class="col-sm-6">
                        <label for="direccion" class="form-label">Direccion de la institucion</label>
                        <input type="text" id="direccion" name="direccion" class="form-control"
                            value="<?= isset($institucion) ? $institucion['direccion'] : '' ?>" require> 
                    </div> 
                    <div class="col-sm-6">
                        <label for="telefono" class="form-label">Telefono de la institucion</label>
                        <input type="number" id="telefono" name="telefono" class="form-control"
                            value="<?= isset($institucion) ? $institucion['telefono'] : '' ?>" require>
                    </div>
                    <div class="col-sm-6">
                        <label for="correo" class="form-label">Correo de la institucion</label>
                        <input type="email" id="correo" name="correo" class="form-control"
                            value="<?= isset($institucion) ? $institucion['correo'] : '' ?>" require>
                    </div>
                    
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