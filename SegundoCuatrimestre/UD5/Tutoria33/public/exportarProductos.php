<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Clases\Producto;

// Crear un nuevo documento de Excel
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Definir encabezados de la tabla
$sheet->setCellValue('A1', 'Código')
    ->setCellValue('B1', 'Nombre')
    ->setCellValue('C1', 'Nombre Corto')
    ->setCellValue('D1', 'Precio');

// Recuperar productos de la base de datos
$productos = (new Producto())->recuperarProductos();

// Rellenar las filas con los datos de los productos
$fila = 2; // Comienza en la fila 2 para evitar los encabezados
foreach ($productos as $producto) {
    $sheet->setCellValue("A{$fila}", $producto->id)
        ->setCellValue("B{$fila}", $producto->nombre)
        ->setCellValue("C{$fila}", $producto->nombre_corto)
        ->setCellValue("D{$fila}", number_format($producto->pvp, 2) . " €");
    $fila++;
}

// Establecer el nombre del archivo
$nombreArchivo = 'productos.xlsx';

// Configurar la cabecera para la descarga
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=\"$nombreArchivo\"");
header('Cache-Control: max-age=0');

// Guardar el archivo en la salida para descarga
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
