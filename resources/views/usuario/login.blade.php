@extends('components.login')

@section('styles')

@endsection

@section('content')



<div class="container d-flex justify-content-center align-items-center min-vh-100  ">
    <div class="card shadow-lg p-4" style="max-width: 740px; ">
        <div class="col-6"><img src="img/izquierda.jpg" alt="Descripción de la imagen" style="display: flex  "></div>
        <br>
        <div class="text-center">

            <h2 class="h5">Acceso al Sistema INTT</h2>
            <p class="text-muted">¡Bienvenido! Inicia sesión para acceder a tu cuenta.</p>
        </div>

        @error('msg')       
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror

        <form action="/login" method="post">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Usuario:</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Tu usuario" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Tu contraseña"
                    required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
        </form>
    </div>
</div>


@endsection