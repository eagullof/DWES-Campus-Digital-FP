<?php
$conProyecto = new mysqli('localhost', 'gestor', 'secreto', 'proyecto');

$unidades = 2;
$resultado = $conProyecto->query('SELECT producto, unidades FROM stocks WHERE unidades < ' . $unidades);

// Obtenemos el primer registro
$stock = $resultado->fetch_array();
$producto = $stock['producto']; // O también $stock[0]
$unidades = $stock['unidades']; // O también $stock[1]
//echo "<p>Producto $producto: $unidades unidades.</p>";

//Ejemplo sin parámetros
$preparada = $conProyecto->stmt_init();
$preparada->prepare('INSERT INTO familias (cod, nombre) VALUES ("RASPBERRY_PI", "Raspberry pi")');
//$preparada->execute();
$preparada->close();

//Ejemplo con parámetros
$preparada = $conProyecto->stmt_init();
$preparada->prepare('INSERT INTO familias (cod, nombre) VALUES (?, ?)');
$cod_producto = "TABLET";
$nombre_producto = "Tablet PC";
$preparada->bind_param('ss', $cod_producto, $nombre_producto); // 'ss' indica dos cadenas
//$preparada->execute();
$preparada->close();

//Consultas que devuelven resultados
$preparadaConResultados = $conProyecto->stmt_init();
$preparadaConResultados->prepare('SELECT producto, unidades FROM stocks WHERE unidades < 2');
$preparadaConResultados->execute();
$preparadaConResultados->bind_result($producto, $unidades);
while ($preparadaConResultados->fetch()) {
    echo "<p>Producto $producto: $unidades unidades.</p>";
}
$preparadaConResultados->close();

//Control de errores
$preparadaErrores = $conProyecto->stmt_init();
$consulta = "SELECT nombre FROM productos WHERE id = ?";
if (!$preparadaErrores->prepare($consulta)) {
    echo "Error preparando la consulta: " . $conProyecto->error;
    die();
}
$preparadaErrores->bind_param('i', $id);
if (!$preparadaErrores->execute()) {
    echo "Error ejecutando la consulta.";
}
$conProyecto->close();
