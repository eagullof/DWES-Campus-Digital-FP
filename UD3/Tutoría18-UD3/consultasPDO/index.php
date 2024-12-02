<?php

$host = "localhost";
$db = "proyecto";
$user = "gestor";
$pass = "secreto";
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$conProyecto = new PDO($dsn, $user, $pass);


//NO DEVUELVE RESULTADOS
//INSERT INTO `stocks` (`producto`, `tienda`, `unidades`) VALUES ('21', '2', '0'), ('1', '3', '0');
$registros = $conProyecto->exec('DELETE FROM stocks WHERE unidades = 0');
echo "<p>Se han borrado $registros registros.</p>";

//DEVUELVE RESULTADOS
$resultado = $conProyecto->query("SELECT producto, unidades FROM stocks");
var_dump($resultado);
// Procesar los resultados
foreach ($resultado as $fila) {
    var_dump($fila);
    echo "<p>Producto: {$fila['producto']}, Unidades: {$fila['unidades']}</p>";
}

var_dump($resultado);