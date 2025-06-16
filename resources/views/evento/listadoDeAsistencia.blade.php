@extends('components.layout')

@section('title', 'Listado de Eventos')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/evento.css') }}">
@endsection

@section('content')


<br>
<br>


@include('components.title', [ 'title' => 'Listado de Asistencia'])

<div class="card " style="box-shadow: 0 0 10px rgba(0,0,0,0.08);">
    <div class="card-body">
        <p class="fs-4">{{ $evento["nombre"] }}</p>

        <table class="table">
            <thead>
                <tr>
                    <th>Cedula </th>
                    <th>Nombre y apellido</th>
                    <th>Asistencia</th>
                    <th>Género</th>
                    <th>Hora de Asistencia</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asistencias as $asistencia)
                <tr>
                    <td>{{ $asistencia["personas"]["cedula"] }}</td>
                    <td>
                        {{ $asistencia["personas"]["primer_nombre"] }}
                        {{ $asistencia["personas"]['segundo_nombre'] }}
                        {{ $asistencia["personas"]['primer_apellido'] }}
                        {{ $asistencia["personas"]['segundo_apellido'] }}
                    </td>
                    <td>{{ $asistencia['asistencia'] }}</td>
                    <td>{{ $asistencia["personas"]['genero']['descripcion'] }}</td>
                    <td>{{ $asistencia['created_at'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection