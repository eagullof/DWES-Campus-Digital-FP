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

class Familia extends Conexion
{
    private $cod;
    private $nombre;

    public function __construct()
    {
        parent::__construct();
    }

    public function recuperarFamilias()
    {
        $consulta = "select * from familias order by nombre";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar: " . $ex->getMessage());
        }

        $familias = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Crear una instancia del generador de códigos de barras
        $generator = new BarcodeGeneratorPNG();

        // Añadir el código de barras a cada producto
        foreach ($familias as $familia) {
            // Generar el código de barras como imagen PNG codificada en base64
            $familia->codigo_barras = base64_encode($generator->getBarcode($familia->cod, BarcodeGeneratorPNG::TYPE_CODE_128));

            $builder = new Builder(
                writer: new PngWriter(),
                writerOptions: [],
                validateResult: false,
                data: $familia->cod,
                encoding: new Encoding('UTF-8'),
                errorCorrectionLevel: ErrorCorrectionLevel::High,
                size: 50,
                margin: 2,
                backgroundColor: new Color(255, 255, 255, 127),
            );

            $result = $builder->build();

            $familia->qrCode = base64_encode($result->getString()); // Convertir la imagen QR a base64
        }

        return $familias;
    }
}
