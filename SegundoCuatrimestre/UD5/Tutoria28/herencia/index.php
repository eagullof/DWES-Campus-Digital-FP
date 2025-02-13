<?php
include_once("coche.php");
include_once("moto.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herencia</title>
</head>

<body>
    <?php
    $miCoche = new Coche();
    $miCoche->misRuedas();
    $miCoche->fardar();
    $miCoche->encender();
    $miCoche->tocarBocina();

    $miMoto = new Moto("Azul", "Yamaha");
    $miMoto->misRuedas();
    $miMoto->fardar();
    $miMoto->encender();
    $miMoto->tocarBocina();

    $miVehiculo = new Vehiculo("Negra", "Bicicleta");
    $miVehiculo->ruedas = 2;
    $miVehiculo->fardar();
    $miVehiculo->encender();
    ?>
</body>

</html>