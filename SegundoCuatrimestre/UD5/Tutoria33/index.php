<?php

header("Location: public/productos.php");

require 'vendor/autoload.php';  // Cargar Faker

use Faker\Factory;

$faker = Factory::create('es_ES'); // Idioma español

// Mostrar datos aleatorios
echo "<h2 style='color: " . $faker->hexColor() . "'>Datos Aleatorios Generados</h2>";
echo "<strong>Nombre:</strong> " . $faker->name() . "<br>";
echo "<strong>Dirección:</strong> " . $faker->address() . "<br>";
echo "<strong>Correo Electrónico:</strong> " . $faker->email() . "<br>";
echo "<strong>Teléfono:</strong> " . $faker->phoneNumber() . "<br>";
echo "<strong>Fecha de Nacimiento:</strong> " . $faker->date('d-m-Y') . "<br>";
echo "<strong>Empresa:</strong> " . $faker->company() . "<br>";
echo "<strong>Texto Aleatorio:</strong> " . $faker->text(200) . "<br>";

$dni = $faker->dni();
echo "<p>DNI " . $dni . " . </p>";
// Make Barcode object of Code128 encoding.
$barcode = (new Picqer\Barcode\Types\TypeCode128())->getBarcode($dni);

// Output the barcode as HTML in the browser with a HTML Renderer
$renderer = new Picqer\Barcode\Renderers\HtmlRenderer();
echo $renderer->render($barcode);
