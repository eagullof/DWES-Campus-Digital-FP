<?php

require '../vendor/autoload.php';

use Philo\Blade\Blade;
use Clases\Producto;

$views = '../views';
$cache = '../cache';

// Inicializar Blade
$blade = new Blade($views, $cache);

// Definir variables
$titulo = 'Productos';
$encabezado = 'Listado de Productos';
$productos = (new Producto())->recuperarProductos();

// Renderizar la vista con las variables
echo $blade->view()->make('vistaProductos', compact('titulo', 'encabezado', 'productos'))->render();
