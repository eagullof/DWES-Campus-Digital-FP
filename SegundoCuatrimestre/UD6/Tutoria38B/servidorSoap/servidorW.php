<?php
require '../vendor/autoload.php';

$url = "http://localhost/DWES-Campus-Digital-FP/SegundoCuatrimestre/UD6/Tutoria38B/servidorSoap/servicio.wsdl";

try {
    $server = new SoapServer($url);
    $server->setClass('Clases\\Operaciones');
    $server->handle();
} catch (SoapFault $f) {
    die("Error en server: " . $f->getMessage());
}
