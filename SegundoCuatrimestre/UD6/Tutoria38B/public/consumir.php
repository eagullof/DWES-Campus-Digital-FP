<?php
require '../vendor/autoload.php';

$url = "http://localhost/DWES-Campus-Digital-FP/SegundoCuatrimestre/UD6/Tutoria38B/servidorSoap/servicio.wsdl";

try {
    $cliente = new SoapClient($url);
} catch (SoapFault $ex) {
    die("Error en el cliente: " . $ex->getMessage());
}

// Mostrar funciones disponibles
var_dump($cliente->__getFunctions());
echo "<br>";

// Llamada directa
echo $cliente->suma(20, 40);
echo "<br>";

// Llamada utilizando __soapCall
$parametros = ['a' => 12, 'b' => 45];
echo $cliente->__soapCall('suma', $parametros);
