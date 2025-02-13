<?php
include_once("triangulo.php");
include_once("cuadrado.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abstracción</title>
</head>

<body>
    <?php
    $miCuadrado = new Cuadrado(50);
    $miTriangulo = new Triangulo(50, 20);

    $areaCuadrado = $miCuadrado->calcularArea();
    echo "<p> El área del cuadrado es $areaCuadrado. </p>";

    $areaTriangulo = $miTriangulo->calcularArea();
    echo "<p> El área del triángulo es $areaTriangulo. </p>";
    ?>
</body>

</html>