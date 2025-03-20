<?php
// Mostrar errores durante el desarrollo
ini_set("display_errors", 1);
error_reporting(E_ALL);

// Función expuesta en el servicio web
function getPVP($codigo)
{
    $productos = [
        "KSTMSDHC8GB" => 10.20,
        "ABC123" => 15.50,
        "XYZ789" => 22.10
    ];

    return $productos[$codigo] ?? 0.0;
}

// Configuración del servidor SOAP
$options = [
    'uri' => 'http://localhost/DWES-Campus-Digital-FP/SegundoCuatrimestre/UD5/Tutoria35',
    'soap_version' => SOAP_1_1
];

$server = new SoapServer("http://localhost/DWES-Campus-Digital-FP/SegundoCuatrimestre/UD5/Tutoria35/getPVP.wsdl", $options);
$server->addFunction("getPVP");
$server->handle();
