@extends('components.layout')

@section('title', 'Listado de Eventos')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/evento.css') }}">
<script src="{{ asset('js/validaciones.js') }}"></script>
@endsection

@section('content')


<br>
<br>


@include('components.title', [ 'title' => $GestionarEvento ?? 'Gestionar Evento'])

<div class="card" style="box-shadow: 0 0 10px rgba(0,0,0,0.08);">
    <div class="card-body">
        <form action="/evento" method="post" id="formularioEvento">
            @csrf
            @if (isset($evento))
                <input type="hidden" name="id" value="<?= $evento['id'] ?>">
            @endif

            <div class="container">
                <div class="row">

                    <!-- Nombre del evento -->
                    <div class="col-sm-6 mb-3">
                        <label for="Nombre" class="form-label">Nombre del evento</label>
                        <input type="text" id="Nombre" name="nombre" class="form-control"
                            value="<?= isset($evento) ? $evento['nombre'] : '' ?>" required minlength="3">
                    </div>

                    <!-- Dirección del evento -->
                    <div class="col-sm-6 mb-3">
                        <label for="Direccion" class="form-label">Dirección del evento</label>
                        <input type="text" id="Direccion" name="direccion" class="form-control"
                            value="<?= isset($evento) ? $evento['direccion'] : '' ?>" required>
                    </div>

                    <!-- Fecha inicio -->
                    <div class="col-sm-6 mb-3">
                        <label for="Fecha_inicio" class="form-label">Fecha inicio</label>
                        <input type="datetime-local" id="Fecha_inicio" name="fecha_inicio" class="form-control"
                            value="<?= isset($evento) ? $evento['fecha_inicio'] : '' ?>" required>
                    </div>

                    <!-- Fecha final -->
                    <div class="col-sm-6 mb-3">
                        <label for="Fecha_final" class="form-label">Fecha final</label>
                        <input type="datetime-local" id="Fecha_final" name="fecha_fin" class="form-control"
                            value="<?= isset($evento) ? $evento['fecha_fin'] : '' ?>" required>
                    </div>

                    <!-- Tipo de evento -->
                    <div class="col-sm-6 mb-3">
                        <label for="tipoDeevento" class="form-label">Tipo de evento</label>
                        <select id="tipoDeevento" name="tipo_de_evento_id" class="form-select" required>
                            <option value="">Seleccione</option>
                            @foreach ($tiposDeEventos as $tipoDeEvento)
                                <option value="{{ $tipoDeEvento['id'] }}"
                                    {{ (isset($evento['tipo_de_evento_id']) && $tipoDeEvento['id'] == $evento['tipo_de_evento_id']) ? 'selected' : '' }}>
                                    {{ $tipoDeEvento['descripcion'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Encargado del evento -->
                    <div class="col-sm-6 mb-3">
                        <label for="Encargado" class="form-label">Encargado del evento</label>
                        <select id="Encargado" name="encargado_id" class="form-select" required>
                            <option value="">Seleccione</option>
                            @foreach ($encargados as $encargado)
                                <option value="{{ $encargado['id'] }}"
                                    {{ (isset($evento['encargado_id']) && $encargado['id'] == $evento['encargado_id']) ? 'selected' : '' }}>
                                    {{ $encargado['primer_nombre'] . ' ' . $encargado['primer_apellido'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Institución del evento -->
                    <div class="col-sm-6 mb-3">
                        <label for="institucion" class="form-label">Institución del evento</label>
                        <select id="institucion" name="institucion_id" class="form-select" required>
                            <option value="">Seleccione</option>
                           @foreach ($instituciones as $institucion)
                                <option value="{{ $institucion->id }}"
                                    {{ (old('institucion_id', $evento->institucion_id ?? '') == $institucion->id) ? 'selected' : '' }}>
                                    {{ $institucion->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('institucion_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Botón Guardar -->
                    <div class="col-sm-12 mt-3 text-end">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>




@endsection
