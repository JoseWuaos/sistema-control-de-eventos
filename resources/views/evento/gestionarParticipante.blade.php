<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/gestionarParticipante.css') }}"> 
    <title>gestionar Participante</title>
</head>
<body>
@extends('components.layout')

@section('title', 'Listado de Eventos')

@section('styles')
    
@endsection

@section('content')

   <div class="form-container">
    <h2>Agregar Nuevo Participante    </h2>
    <form>
      <div class="form-grid">
        <div>
          <label for="primer-nombre">Primer Nombre</label>
          <input type="text" id="primer-nombre" name="primer-nombre">
        </div>
        <div>
          <label for="segundo-nombre">Segundo Nombre</label>
          <input type="text" id="segundo-nombre" name="segundo-nombre">
        </div>
        <div>
          <label for="primer-apellido">Primer Apellido</label>
          <input type="text" id="primer-apellido" name="primer-apellido">
        </div>
        <div>
          <label for="segundo-apellido">Segundo Apellido</label>
          <input type="text" id="segundo-apellido" name="segundo-apellido">
        </div>
        <div>
          <label for="fecha-nacimiento">Fecha de Nacimiento</label>
          <input type="date" id="fecha-nacimiento" name="fecha-nacimiento">
        </div>
        <div>
          <label for="genero">Género</label>
          <select id="genero" name="genero">
            <option value="">Seleccione</option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
            <option value="otro">Otro</option>
          </select>
        </div>
      </div>
      <div class="form-footer">
        <button type="submit">Confirmar</button>
      </div>
    </form>
  </div>

</body>
</html>