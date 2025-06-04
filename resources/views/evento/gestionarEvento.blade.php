@extends('components.layout')

@section('title', 'Listado de Eventos')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/evento.css') }}">
@endsection

@section('content')


<br>
<br>


@include('components.title', [ 'title' => $title])

<div class="card " style="box-shadow: 0 0 10px rgba(0,0,0,0.08);">
    <div class="card-body">

        <form action="/evento" method="post">
            @csrf
            @if (isset($evento))
            <input type="hidden" name="id" value="<?= $evento['id'] ?>">
            @endif
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" id="Nombre" name="nombre" class="form-control"
                            value="<?= isset($evento) ? $evento['nombre'] : '' ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="Direccion" class="form-label">Direccion</label>
                        <input type="text" id="Direccion" name="direccion" class="form-control"
                            value="<?= isset($evento) ? $evento['direccion'] : '' ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="Fecha inicio" class="form-label">Fecha inicio</label>
                        <input type="date" id="Fecha de inicio" name="fecha_inicio" class="form-control"
                            value="<?= isset($evento) ? $evento['fecha_inicio'] : '' ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="Fecha final" class="form-label">Fecha final</label>
                        <input type="date" id="Fecha Final" name="fecha_fin" class="form-control"
                            value="<?= isset($evento) ? $evento['fecha_fin'] : '' ?>">
                    </div>

                    <div class="col-sm-6">
                        <label for="tipoDeevento" class="form-label">Tipo de evento</label>
                        <select id="tipoDeevento" name="tipo_de_evento_id" class="form-select">
                            <option value="">Seleccione</option>
                            @foreach ($tiposDeEventos as $tipoDeEvento)
                            @if( isset($evento['tipo_de_evento_id']) && $tipoDeEvento['id'] ==
                            $evento['tipo_de_evento_id'])
                            <option selected='true' value="<?= $tipoDeEvento['id']?>"><?= $tipoDeEvento['descripcion']?>
                            </option>
                            @else
                            <option value="<?= $tipoDeEvento['id']?>"><?= $tipoDeEvento['descripcion']?></option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="Encargado" class="form-label">Encargado</label>
                        <select id="Encargado" name="encargado_id" class="form-select">
                            <option value="">Seleccione</option>
                            @foreach ($encargados as $encargado)
                            @if( isset($evento['encargado_id']) && $encargado['id'] == $evento['encargado_id'])
                            <option selected='true' value="<?= $encargado['id']?>">
                                <?= $encargado['primer_nombre'] . ' ' . $encargado['primer_apellido']?></option>
                            @else
                            <option value="<?= $encargado['id']?>">
                                <?= $encargado['primer_nombre'] . ' ' . $encargado['primer_apellido']?></option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 ">
                        <button class="btn btn-primary float-end mt-3" type="submit">Guardar</button>
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection