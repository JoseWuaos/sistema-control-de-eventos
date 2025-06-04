
@extends('components.layout')

@section('title', 'Listado de Eventos')

@section('styles')
    
@endsection

@section('content')
     
        <br>
        <br>

       <h1 class="titulo">Gestion de Encargado</h1>
<div style="width: 100%; padding: 3px; background-color: blue ">

</div>
<div class="card" style="width: 100% margin-top: 48px; box-shadow: 0 0 10px rgba(0,0,0,0.08);">
    <div class="card-body">
        <h2>Lista de Encargado</h2>

        <a href="{{ asset('/gestionarEncargado') }}" class="btn btn-primary"
            style='position: fixed; bottom: 20px; right: 20px; z-index: 1000; padding: 10px 20px; border-radius: 5px;'>+
            Nuevo Encargado</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Primer Nombre</th>
                    <th>Segundo Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Fecha De Nacimiento</th>
                    <th>Genero</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Egardo</td>
                    <td>Alfonso</td>
                    <td>Vegas</td>
                    <td>Key</td>
                    <td>24-12-2006</td>
                    <td>Masculino</td>
                    <td class="actions">
                        <button class="btn btn-primary btn btn-edit">Editar</button>
                        <button class="btn btn-danger btn btn-delete">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>Jose</td>
                    <td>Manuel</td>
                    <td>Abello</td>
                    <td>Gomez</td>
                    <td>29-10-2003</td>
                    <td>Masculino</td>
                    <td class="actions">
                        <button class="btn btn-primary btn btn-edit">Editar</button>
                        <button class="btn btn-danger btn btn-delete">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
  <nav aria-label="Page navigation">
   <ul class="pagination custom-pagination">
    <li class="page-item"><a class="page-link" href="#">Atras</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
   </ul>
 </nav>
</div>
@endsection 



