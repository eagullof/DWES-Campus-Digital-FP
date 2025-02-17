<?php
include_once('cuentaBancaria.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta bancaria</title>
</head>

<body>
    <?php
    $miCuenta = new CuentaBancaria("Esther Agulló", 100);
    $miCuenta->mostrarInformacion();
    $miCuenta->depositar(50);
    $miCuenta->mostrarInformacion();
    $miCuenta->retirar(200);
    $miCuenta->retirar(125);
    $miCuenta->mostrarInformacion();
    $miCuenta->set_iban(1234);
    echo $miCuenta->get_iban() . "<br>";
    echo CuentaBancaria::DIGITOS_IBAN;
    ?>
</body>

</html>