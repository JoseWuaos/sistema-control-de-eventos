@extends('components.layout')

@section('title', 'Gestinar asistencia')

@section('styles')


@section('content')


<br>
<br>

@include('components.title', [ 'title' => 'Gestionar asistencia'])

<div class="card " style="box-shadow: 0 0 10px rgba(0,0,0,0.08);">
    <div class="card-body">

        <form action="/evento/asistencia" method="post">
            @csrf
            <div class="container">
                <div class="row">
                    @if ($id != 'new')
                    <input type="hidden" name="evento_id" value="<?= $id ?>">
                    @else
                    <div class="col-sm-12">
                        <label for="Eventos" class="form-label">Evento</label>
                        <select id="Eventos" name="evento_id" class="form-select" default="<?= $id ?>">
                            <option value="" default> </option>
                            @foreach($eventos as $evento)
                            <option value="<?= $evento["id"] ?>"><?= $evento["nombre"] ?></option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    <div class="grid">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="cedula" class="form-label ">Cedula</label>
                                <input type="text" id="cedula" name="cedula" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label for="primer_nombre" class="form-label ">Primer Nombre</label>
                                <input type="text" id="primer_nombre" name="primer_nombre" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label for="segundo_nombre" class="form-label ">Segundo Nombre</label>
                                <input type="text" id="segundo_nombre" name="segundo_nombre" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label for="primer_apellido" class="form-label ">Primer apellido</label>
                                <input type="text" id="primer_apellido" name="primer_apellido" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label for="segundo_apellido" class="form-label ">Segundo apellido</label>
                                <input type="text" id="segundo_apellido" name="segundo_apellido" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label for="genero" class="form-label ">Genero</label>
                                <select id="genero" name="genero_id" class="form-select">
                                    <option value="" default> </option>
                                    @foreach($generos as $genero)
                                    <option value="<?= $genero["id"] ?>"><?= $genero["descripcion"] ?></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="Fecha_nacimiento" class="form-label">Fecha nacimiento</label>
                                <input type="date" id="Fecha_nacimiento" name="fecha_nacimiento" class="form-control">
                            </div>

                            <div class="col-sm-6">
                                <label for="asistencia" class="form-label ">Asistencia</label>
                                <select id="asistencia" name="asistencia" class="form-select">
                                    <option value="" default> </option>
                                    <option value="presente">Presente</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <button class="btn btn-primary float-end mt-3" type="submit">Confirmar</button>
            </div>
        </form>
    </div>
</div>

@endsection