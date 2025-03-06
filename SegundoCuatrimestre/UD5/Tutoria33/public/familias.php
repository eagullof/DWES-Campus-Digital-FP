<?php

require '../vendor/autoload.php';

use Philo\Blade\Blade;
use Clases\Familia;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\OpenSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

$views = '../views';
$cache = '../cache';

// Inicializar Blade
$blade = new Blade($views, $cache);

// Definir variables
$titulo = 'Familias';
$encabezado = 'Listado de Familias';
$familias = (new Familia())->recuperarFamilias();
$barcodes = [];
$qrCodes = [];

// Crear una instancia del generador de códigos de barras
$generator = new BarcodeGeneratorPNG();

foreach ($familias as $familia) {
    $barcode = (new Picqer\Barcode\Types\TypeCode128())->getBarcode($familia->cod);

    $builder = new Builder(
        writer: new PngWriter(),
        writerOptions: [],
        validateResult: false,
        data: $familia->cod . ': ' . $familia->nombre,
        encoding: new Encoding('UTF-8'),
        errorCorrectionLevel: ErrorCorrectionLevel::High,
        size: 75,
        margin: 3,
        roundBlockSizeMode: RoundBlockSizeMode::Margin,
        // logoPath: 'decimo_2024.jpg',
        // logoResizeToWidth: 50,
        // logoPunchoutBackground: true,
        labelText: $familia->cod,
        labelFont: new OpenSans(12),
        labelAlignment: LabelAlignment::Center
    );

    $result = $builder->build();


    // Output the barcode as HTML in the browser with a HTML Renderer
    $renderer = new Picqer\Barcode\Renderers\HtmlRenderer();
    $barcodes[$familia->cod] = $renderer->render($barcode);
    $qrCodes[$familia->cod] = base64_encode($result->getString());
}

// Renderizar la vista con las variables
echo $blade->view()->make('vistaFamilias', compact('titulo', 'encabezado', 'familias', 'barcodes', 'qrCodes'))->render();
