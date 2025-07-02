<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi App')</title>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/bootstrap-5.0.2-dist/css/bootstrap.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/date-fns@3.6.0/cdn.min.js"></script>


</head>

<div class="container">
    <div class="row">
        <div class="col-6"><img src="img/izquierda.jpg" alt="Descripción de la imagen"></div>
        <div class="col-6"><img src="img/derecha.jpg" alt="Descripción de la imagen" style="float: right; height: 59px">
        </div>
    </div>
</div>

<body>
    <div class="container-fluid">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm position-absolute top-3 end-0 m-5">
                <i class='bxr  bx-arrow-out-up-square-half'></i> Cerrar Sesión
            </button>
        </form>
        <div class="row">
            <div class="col-sm-2" style="padding-left: 0px">
                {{-- Menú lateral --}}
                <div class="sidebar">
                    <h5 class="text-center">INTT</h5>
                    <a href="/evento">Eventos</a>
                    <a href="/evento/asistencia/new">Asistencia</a>
                    <a href="/personas">Personas</a>
                    <a href="/encargado">Encargado</a>
                    <a href="/institucion">Institucion</a>
                </div>

            </div>
            <div class="col-sm-10">
                {{-- Contenido dinámico --}}
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>

        <footer class="main-footer">
            <div class="footer-content">
                <p>Cumpliendo con la Ley de Infogobierno, publicado en Gaceta No. 400.192</p>
                <p>Del Software Libre el Software Socialista</p>
                <p>Copyright &copy; 2026 Ministerio del Poder Popular para el Transporte</p>
                <p>Desarrollado por: Oficina de Tecnología de la Información y la Comunicación</p>
            </div>

        </footer>

    </div>




</body>

</html>