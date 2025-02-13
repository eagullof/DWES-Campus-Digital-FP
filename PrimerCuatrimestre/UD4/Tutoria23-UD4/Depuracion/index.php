<?php
session_start();
$_SESSION['usuario'] = "esther";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excepciones</title>
</head>

<body>
    <p>En esta página probaremos la depuración con VSC y PHP.</p>
    <ul>
        <li>Primer punto de depuración.</li>
        <?= '<ul><li>Aquí se parará la ejecución.</li></ul>' ?>
        <li>Segundo punto de depuración.</li>
        <?php
        $contador = 0;
        $contador++;
        echo '<ul><li>El contador es ' . $contador . '. </li></ul>';
        ?>
        <li>Tercer punto de depuración.</li>
        <?php
        session_unset();
        session_destroy();
        ?>
        <li>Cuarto punto de depuración.</li>
        <?php
        $contador++;
        echo '<ul><li>El contador es ' . $contador . '. </li></ul>';
        ?>
    </ul>

</body>

</html>