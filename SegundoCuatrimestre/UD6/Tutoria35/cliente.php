<?php
try {
    // Crear cliente SOAP y conectarlo con el WSDL
    $client = new SoapClient("http://localhost/DWES-Campus-Digital-FP/SegundoCuatrimestre/UD5/Tutoria35/getPVP.wsdl");

    // Llamar a la función del servicio web
    $resultado = $client->getPVP("ABC123");

    echo "El PVP es: " . $resultado;
} catch (SoapFault $e) {
    echo "Error: " . $e->getMessage();
}
