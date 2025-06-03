@extends('components.layout')

@section('title', 'Gestinar asistencia')

@section('styles')


@section('content')


<br>
<br>

@include('components.title', [ 'title' => 'Gestior asistencia'])

<div class="card " style="box-shadow: 0 0 10px rgba(0,0,0,0.08);">
    <div class="card-body">


        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <label for="Eventos" class="form-label">Eventos</label>
                    <select id="Eventos" name="Eventos" class="form-select">
                        <option value="">Feria de musica</option>
                        <option value="Festejo">Feria cultural</option>
                        <option value="Feria Cultural">Festejo</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>

                <div class="grid">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="Asistencia" class="form-label ">Asistencia</label>
                            <input type="text" id="Asistencia" name="Asistencia" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="Participante" class="form-label">Participante</label>
                            <input type="text" id="SParticipante" name="Participante" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="Fecha inicio" class="form-label">Fecha inicio</label>
                            <input type="text" id="Fecha inicio" name="Fecha inicio" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="Fecha inicio" class="form-label">Fecha inicio</label>
                            <input type="text" id="Fecha inicio" name="Fecha inicio" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label for="Fecha inicio" class="form-label">Fecha final</label>
                            <input type="text" id="Fecha final" name="Fecha final" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary float-end mt-3">Confirmar</button>
        </div>
    </div>
</div>

@endsection