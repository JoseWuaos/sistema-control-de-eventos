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
                                <input type="text" id="cedula" name="cedula" class="form-control" maxLength="9">
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

<script>
    function fetchParticipanteData() { 
        const value = document.getElementById('cedula').value;
        if (value.length === 8 || value.length === 9) {
            fetch(`/participante/cedula/${value}`)
                .then(response => {
                    if(response.status === 404){
                        throw new Error('Participante no encontrado');
                    }
                      
                    
                    return response.json()
                })
                .then(data => {
                    console.log(data)
                        document.getElementById('primer_nombre').value = data.primer_nombre;
                        document.getElementById('segundo_nombre').value = data.segundo_nombre;
                        document.getElementById('primer_apellido').value = data.primer_apellido;
                        document.getElementById('segundo_apellido').value = data.segundo_apellido;
                        document.getElementById('genero').value = data.genero_id;

                        const fechaNacimiento = dateFns.format(new Date(data.fecha_nacimiento), 'yyyy-MM-dd');
                        document.getElementById('Fecha_nacimiento').value = fechaNacimiento;

                        
                    
                })
                
        }
    }


document.addEventListener('DOMContentLoaded', function() {
    const cedulaInput = document.getElementById('cedula');
    cedulaInput.addEventListener('input', function() {
        // add debounce to avoid too many requests
        if (cedulaInput.timeout) {
            clearTimeout(cedulaInput.timeout);
        }
        cedulaInput.timeout = setTimeout(() => {
            fetchParticipanteData();
        }, 500); // 500ms debounce        
    });
});
</script>


@endsection