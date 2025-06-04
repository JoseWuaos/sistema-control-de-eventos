@extends('components.layout')

@section('title', 'Listado de Eventos')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/evento.css') }}">
@endsection

@section('content')


<br>
<br>


@include('components.title', [ 'title' => 'Gestionar evento'])

<div class="card " style="box-shadow: 0 0 10px rgba(0,0,0,0.08);">
    <div class="card-body">
        <h2>Agregar un Evento</h2>
        <form>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="Nombre" class="form-label" >Nombre</label>
                        <input type="text" id="Nombre" name="Nombre" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <label for="Direccion" class="form-label">Direccion</label>
                        <input type="text" id="Direccion" name="Direccion" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <label for="Fecha inicio" class="form-label">Fecha inicio</label>
                        <input type="text" id="Fecha de inicio" name="fecha de inicio" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <label for="Fecha final" class="form-label">Fecha final</label>
                        <input type="text" id="Fecha Final" name="Fecha final" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <label for="Encargado" class="form-label">Genero</label>
                        <select id="Encargado" name="Encargado" class="form-select">
                            <option value="">Seleccione</option>
                            <option value="Festejo">Femenino</option>
                            <option value="Feria Cultural">Masculino</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="Encargado" class="form-label">Encargado</label>
                        <select id="Encargado" name="Encargado" class="form-select">>
                            <option value="">Seleccione</option>
                            <option value="Festejo">Jose Abello</option>
                            <option value="Feria Cultural">Maria Teresa</option>
                            <option value="otro">Otro</option>
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