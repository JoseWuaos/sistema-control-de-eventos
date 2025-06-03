<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi App')</title>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
     <link rel="stylesheet" href="{{ asset('dist/bootstrap-5.0.2-dist/css/bootstrap.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2" style="padding-left: 0px">
                {{-- Menú lateral --}}
                <div class="sidebar">
                    <h5 class="text-center">INTT</h5>
                    <a href="/evento">Eventos</a>
                    <a href="/participante">Participante</a>
                    <a href="/encargado">Encargado</a>
                </div>
            </div>
            <div class="col-sm-10">
                {{-- Contenido dinámico --}}
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>





</body>

</html>