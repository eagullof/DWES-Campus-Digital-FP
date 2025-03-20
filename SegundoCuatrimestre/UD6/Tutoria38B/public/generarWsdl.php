<?php
require '../vendor/autoload.php';

use PHP2WSDL\PHPClass2WSDL;

$wsdlGenerator = new PHPClass2WSDL('Clases\\Operaciones', 'http://localhost/DWES-Campus-Digital-FP/SegundoCuatrimestre/UD6/Tutoria38B/servidorSoap/servidor.php');
$wsdlGenerator->generateWSDL(true);
$wsdlGenerator->save("../src/operaciones.wsdl");
