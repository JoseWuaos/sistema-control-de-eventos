@extends('components.layout')

@section('title', 'Listado de Participates')

@section('styles')

@endsection

@section('content')


<br>
<br>
@include('components.title', [ 'title' => 'Gestionar Participante'])

<div class="card " style="box-shadow: 0 0 10px rgba(0,0,0,0.08);">
    <div class="card-body">
        <h2>Agregar un Participante</h2>

        <form action="/gestionarParticipante" method="post">

         @csrf
            @if (isset($participante))
            <input type="hidden" name="id" value="<?= $participante['id'] ?>">
            @endif
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="Nombre" class="form-label">Primer Nombre</label>
                        <input type="text" id="Nombre" name="nombre" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <label for="Direccion" class="form-label">Segundo Nombre</label>
                        <input type="text" id="Direccion" name="direccion" class="form-control"
                         value="<?= isset($participante) ? $participante['direccion'] : '' ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="Fecha inicio" class="form-label">Primer Apellido</label>
                        <input type="text" id="Fecha de inicio" name="fecha_inicio" class="form-control"
                        value="<?= isset($participante) ? $participante['fecha_inicio'] : '' ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="Fecha final" class="form-label">Segundo Apellido</label>
                        <input type="text" id="Fecha Final" name="fecha_final" class="form-control"
                        value="<?= isset($participante) ? $participante['fecha_final'] : '' ?>">
                    </div>                
                    <div class="col-sm-6">
                        <label for="Genero" class="form-label">Genero</label>
                        <select id="Genero" name="genero" class="form-select">
                            <option value="">Seleccione</option>
                            <option value="Festejo">Femenino</option>
                            <option value="Feria Cultural">Masculino</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="col-sm-12 ">
                        <button class="btn btn-primary float-end mt-3"  type="submit">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection