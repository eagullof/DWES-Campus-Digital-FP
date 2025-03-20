<?php
$url = 'http://localhost/DWES-Campus-Digital-FP/SegundoCuatrimestre/UD6/Tutoria38A/servidor.php';
$uri = 'http://localhost/DWES-Campus-Digital-FP/SegundoCuatrimestre/UD6/Tutoria38A';
$paramSaludo = ['texto' => "Manolo"];
$param = ['a' => 51, 'b' => 29];

try {
    //$client = new SoapClient($wsdl);
    $cliente = new SoapClient(null, [
        'location' => $url,
        'uri' => $uri
    ]);
} catch (SoapFault $ex) {
    echo "Error: " . $ex->getMessage();
}

$saludo = $cliente->__soapCall('saludo', $paramSaludo);
$suma = $cliente->__soapCall('suma', $param);
$resta = $cliente->__soapCall('resta', $param);

echo "$saludo. La suma es: $suma y la resta es: $resta";

// Alternativamente, se podría hacer:
$saludo = $cliente->saludo("Manolo");
