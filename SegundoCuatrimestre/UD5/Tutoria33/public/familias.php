<?php

require '../vendor/autoload.php';

use Philo\Blade\Blade;
use Clases\Familia;
use Picqer\Barcode\BarcodeGeneratorPNG;

$views = '../views';
$cache = '../cache';

// Inicializar Blade
$blade = new Blade($views, $cache);

// Definir variables
$titulo = 'Familias';
$encabezado = 'Listado de Familias';
$familias = (new Familia())->recuperarFamilias();
$barcodes = [];

// Crear una instancia del generador de códigos de barras
$generator = new BarcodeGeneratorPNG();

foreach ($familias as $familia) {
    // Make Barcode object of Code128 encoding.
    $codigo_barras = base64_encode($generator->getBarcode($familia->cod, BarcodeGeneratorPNG::TYPE_CODE_128));

    //$barcode = (new Picqer\Barcode\Types\TypeCode128())->getBarcode($familia->cod);

    // Output the barcode as HTML in the browser with a HTML Renderer
    //$renderer = new Picqer\Barcode\Renderers\HtmlRenderer();
    $barcodes[$familia->cod] = $codigo_barras;
}

// Renderizar la vista con las variables
echo $blade->view()->make('vistaFamilias', compact('titulo', 'encabezado', 'familias', 'barcodes'))->render();
