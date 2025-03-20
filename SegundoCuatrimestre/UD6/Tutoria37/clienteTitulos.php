<?php
try {
    // URL del documento WSDL
    $wsdl = "https://cvnet.cpd.ua.es/servicioweb/publicos/pub_gestdocente.asmx?wsdl";

    // Crear el cliente SOAP
    $client = new SoapClient($wsdl);

    var_dump($client->__getFunctions());

    // Parámetros de entrada
    $params = [
        "plengua" => "es",  // Código del idioma
        "pcurso" => "2023"  // Código del curso
    ];

    // Parámetros de entrada
    $params2 = [
        "plengua" => "C",  // Código del idioma
        "pcurso" => "2023-24",  // Código del curso
        "pcoddep" => "B142",
        "pcodest" => "",
        "pcodarea" => ""
    ];

    // Llamada al servicio web
    $response = $client->wstitulosuni($params);
    $response2 = $client->wsasidepto($params2);

    echo "<br>";
    foreach ($response2->wsasideptoResult->ClaseAsiDepto as $clase) {
        echo "<p>$clase->codasi</p>";
        echo "<p>$clase->nomasi</p>";
        echo "<p>$clase->enlaceasi</p>";
        echo "<br>";
    }

    // Mostrar los resultados
    echo "<h1>Listado de Titulaciones:</h1>";
    foreach ($response->wstitulosuniResult->ClaseTitulosUni as $titulo) {
        echo "<p><strong>Nombre:</strong> {$titulo->nombre}<br>";
        echo "<strong>Tipo:</strong> {$titulo->tipo}<br>";
        echo "<strong>Área:</strong> {$titulo->area}<br>";
        echo "<strong>URL:</strong> <a href='{$titulo->url}'>{$titulo->url}</a><br>";
        echo "<img src='{$titulo->imagen}' alt='Imagen del Título' width='100'></p>";
    }
} catch (SoapFault $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}
