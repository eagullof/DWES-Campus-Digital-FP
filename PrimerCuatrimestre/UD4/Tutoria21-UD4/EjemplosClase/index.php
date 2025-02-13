<?php
// Iniciar la sesión o recuperar una sesión anterior
session_start();

// Incrementar el contador de visitas
if (isset($_SESSION['visitas']))
    $_SESSION['visitas'][0]++;
else
    $_SESSION['visitas'][0] = 1;

echo "Número de visitas: " . $_SESSION['visitas'][0];

// Añadir la marca de tiempo actual al array "visitas"
$_SESSION['visitas'][1][] = time();

// Mostrar todas las visitas registradas
echo "<br>Visitas anteriores:<br>";
foreach ($_SESSION['visitas'][1] as $timestamp) {
    echo date("Y-m-d H:i:s", $timestamp) . "<br>";
}

session_unset();
session_destroy();

?>