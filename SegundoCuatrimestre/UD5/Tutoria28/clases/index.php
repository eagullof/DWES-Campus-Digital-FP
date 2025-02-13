<?php
include_once("coche.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación de clases</title>
</head>

<body>
    <?php
    // Crear un objeto de la clase Coche
    $cocheBase = new Coche();
    $cocheBase->fardar();

    $miCoche = new Coche("Beige", "Renault");
    $miCoche->fardar();

    $miCoche->color = "Rojo";
    $miCoche->marca = "Toyota";
    $miCoche->fardar();
    
    $miCoche->arrancar();
    ?>
</body>

</html>