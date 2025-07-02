<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi App')</title>
    <link rel="stylesheet" href="{{ asset('css/usuario.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/date-fns@3.6.0/cdn.min.js"></script>

     <link rel="stylesheet" href="{{ asset('dist/bootstrap-5.0.2-dist/css/bootstrap.css') }}">


</head>

<body>
            <div class="col-sm-10">
                {{-- Contenido dinámico --}}
                <div class="content">
                    @yield('content')
                </div>
            </div>
        




</body>

</html>