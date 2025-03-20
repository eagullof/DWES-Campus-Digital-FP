<?php
class Operaciones
{
    public function resta($a, $b)
    {
        return $a - $b;
    }

    public function suma($a, $b)
    {
        return $a + $b;
    }

    public function saludo($texto)
    {
        return "Hola $texto";
    }
}

$uri = 'http://localhost/DWES-Campus-Digital-FP/SegundoCuatrimestre/UD6/Tutoria38A';
$parametros = ['uri' => $uri];

try {
    // $server = new SoapServer("http://localhost/DWES-Campus-Digital-FP/SegundoCuatrimestre/UD5/Tutoria35/getPVP.wsdl", $options);
    // $server->addFunction("getPVP");
    // $server->handle();
    $server = new SoapServer(NULL, $parametros);
    $server->setClass('Operaciones');
    $server->handle();
} catch (SoapFault $f) {
    die("Error en server: " . $f->getMessage());
}
