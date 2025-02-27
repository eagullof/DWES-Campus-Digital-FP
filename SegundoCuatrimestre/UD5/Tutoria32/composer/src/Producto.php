<?php

namespace Clases;

use PDO;
use PDOException;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;

class Producto extends Conexion
{
    private $id;
    private $nombre;
    private $nombre_corto;
    private $pvp;
    private $familia;
    private $descripcion;

    public function __construct()
    {
        parent::__construct();
    }

    function recuperarProductos()
    {
        $consulta = "SELECT * FROM productos ORDER BY nombre";
        $stmt = $this->conexion->prepare($consulta);

        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar productos: " . $ex->getMessage());
        }

        $productos = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Crear una instancia del generador de códigos de barras
        $generator = new BarcodeGeneratorPNG();

        // Añadir el código de barras a cada producto
        foreach ($productos as $producto) {
            // Generar el código de barras como imagen PNG codificada en base64
            $producto->codigo_barras = base64_encode($generator->getBarcode($producto->id, BarcodeGeneratorPNG::TYPE_CODE_128));

            $builder = new Builder(
                writer: new PngWriter(),
                writerOptions: [],
                validateResult: false,
                data: $producto->id,
                encoding: new Encoding('UTF-8'),
                errorCorrectionLevel: ErrorCorrectionLevel::High,
                size: 50,
                margin: 2,
                backgroundColor: new Color(255, 255, 255, 127),
            );

            $result = $builder->build();

            $producto->qrCode = base64_encode($result->getString()); // Convertir la imagen QR a base64
        }

        $this->conexion = null;
        return $productos;
    }
}
