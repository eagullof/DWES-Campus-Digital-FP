<?php
// Iniciar sesión para depuración de variables de sesión
session_start();

// Definir una variable
$nombre = "Juan";
$edad = 25;

// Punto de interrupción 1: Ver el estado de las variables
$edad += 5;
echo "Edad después de sumar 5: $edad\n";

// Función que realiza una operación matemática
function calcularArea($base, $altura) {
    // Punto de interrupción 2: Depurar valores de los parámetros
    $area = $base * $altura;
    return $area;
}

// Llamar a la función con valores de prueba
$base = 10;
$altura = 5;
$area = calcularArea($base, $altura);
echo "El área calculada es: $area\n";

// Crear un array
$frutas = ["Manzana", "Banana", "Cereza"];

// Punto de interrupción 3: Inspeccionar el array
foreach ($frutas as $fruta) {
    echo "Fruta: $fruta\n";
}

// Definir una variable de sesión
$_SESSION['usuario'] = $nombre;

// Punto de interrupción 4: Inspeccionar la variable de sesión
echo "Usuario en sesión: " . $_SESSION['usuario'] . "\n";
?>
