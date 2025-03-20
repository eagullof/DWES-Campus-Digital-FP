<?php
require '../vendor/autoload.php';

use PHP2WSDL\PHPClass2WSDL;

$class = "Clases\\Operaciones";
$uri = 'http://localhost/DWES-Campus-Digital-FP/SegundoCuatrimestre/UD6/Tutoria38/servidorSoap/servidorW.php';
$wsdlGenerator = new PHPClass2WSDL($class, $uri);
$wsdlGenerator->generateWSDL(true);
$fichero = $wsdlGenerator->save('../servidorSoap/servicio.wsdl');
