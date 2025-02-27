<?php

require '../vendor/autoload.php';

use Philo\Blade\Blade;
use Clases\Familia;

$views = '../views';
$cache = '../cache';

// Inicializar Blade
$blade = new Blade($views, $cache);

// Definir variables
$titulo = 'Familias';
$encabezado = 'Listado de Familias';
$familias = (new Familia())->recuperarFamilias();

// Renderizar la vista con las variables
echo $blade->view()->make('vistaFamilias', compact('titulo', 'encabezado', 'familias'))->render();
