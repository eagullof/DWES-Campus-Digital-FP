<?php
// Comprobar si no se ha enviado el usuario y la contraseña
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    // Enviar las cabeceras HTTP para solicitar autenticación
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    readfile('401.html'); // Incluye el contenido de 401.html
    exit; // No mostramos ningún mensaje adicional
}

// Credenciales correctas
$usuario_correcto = "gestor";
$contrasena_correcta = "secreto";

// Comprobar las credenciales
if ($_SERVER['PHP_AUTH_USER'] === $usuario_correcto && $_SERVER['PHP_AUTH_PW'] === $contrasena_correcta) {
    echo "Bienvenido, " . htmlspecialchars($_SERVER['PHP_AUTH_USER']) . "!";
} else {
    // Si las credenciales son incorrectas, generar el error 401
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    readfile('401.html'); // Incluye el contenido de 401.html    exit; // El servidor usará la página configurada con ErrorDocument 401
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Bienvenid@ al Área pública</h1>
    <a href="private/">Ir al Área restringida.</a>
    <br>
    <h1 class="text-primary-emphasis d-flex justify-content-center">Tutoría 20</h1>
    <div class="d-flex justify-content-center">
        <a class="btn btn-primary m-2" href="ejercicioResuelto2/">Ejercicio resuelto 2 - Autenticación</a>
        <a class="btn btn-primary m-2" href="ejercicioResuelto3/">Ejercicio resuelto 3 - Cookies</a>
        <a class="btn btn-primary m-2" href="ejercicioResuelto4/">Ejercicio resuelto 4 - Sesiones</a>
        <a class="btn btn-primary m-2" href="Tienda/">Tienda</a>
        <button class="btn btn-primary m-2" onclick="history.back();">Volver</button>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>