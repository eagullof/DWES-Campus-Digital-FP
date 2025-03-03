<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>@yield('titulo')</title>
</head>

<body>
    <div class="container mt-3">
        <h3 class="text-center">@yield('encabezado')</h3>
        @yield('contenido')
    </div>
    <a href="@yield('enlace')">@yield('textoEnlace')</a>
</body>

</html>
