<?php
require '../vendor/autoload.php';  // Cargar Faker

use Faker\Factory;

$faker = Factory::create('es_ES'); // Idioma español

// Mostrar datos aleatorios
echo "<h2>Datos Aleatorios Generados</h2>";
echo "<strong>Nombre:</strong> " . $faker->name() . "<br>";
echo "<strong>Dirección:</strong> " . $faker->address() . "<br>";
echo "<strong>Correo Electrónico:</strong> " . $faker->email() . "<br>";
echo "<strong>Teléfono:</strong> " . $faker->phoneNumber() . "<br>";
echo "<strong>Fecha de Nacimiento:</strong> " . $faker->date('d-m-Y') . "<br>";
echo "<strong>Empresa:</strong> " . $faker->company() . "<br>";
echo "<strong>Texto Aleatorio:</strong> " . $faker->text(200) . "<br>";
