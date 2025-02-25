<?php
session_start();

include_once('producto.php');
include_once('persona.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparación de objetos</title>
</head>
<body>
    <?php
    $p = new Producto();
    $p->nombre = 'Samsung Galaxy A6';
    $a = clone($p);
    $p->pvp = 30;
    $serializado = serialize($p);


    var_dump($serializado);
    echo "<hr>";
    $desserializado = unserialize($serializado);
    var_dump($desserializado);
    echo "<hr>";

    $_SESSION['producto'] = $p;
    var_dump($_SESSION);
    echo "<p>_SESSION</p><hr>";
    $obtenidoDesdeSesion = $_SESSION['producto'];
    var_dump($obtenidoDesdeSesion);
    echo "<p>Obtenido desde sesion</p><hr>";
    var_dump($a);
    echo "<br>";
    var_dump($p);
    if($a === $p){
        echo "<p> El objeto es el mismo. </p>";
    }elseif ($a == $p) {
        echo "<p> Los atributos de los productos a y p son iguales. </p>";
    }else{
        echo "<p> No tienen nada que ver. </p>";
    }

    $persona = new Persona();
    $persona->nombre="Manuel";
    $persona->apellidos="Gil Gil";
    $persona->perfil="Público";
    echo $persona; //muestra: Gil Gil, Manuel, Tu pérfil es: Público
    ?>
</body>
</html>