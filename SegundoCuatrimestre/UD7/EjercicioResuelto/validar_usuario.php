<?php
session_start();
header('Content-Type: application/json');

$conexion = new mysqli("localhost", "gestor", "secreto", "proyecto");

$usuario = $_POST['usuario'];
$pass = hash('sha256', $_POST['pass']);

$consulta = $conexion->prepare("SELECT usuario FROM usuarios WHERE usuario=? AND pass=?");
$consulta->bind_param("ss", $usuario, $pass);
$consulta->execute();
$consulta->store_result();

if ($consulta->num_rows > 0) {
    $_SESSION['usuario'] = $usuario;
    echo json_encode(['exito' => true]);
} else {
    echo json_encode(['exito' => false, 'mensaje' => 'Credenciales incorrectas']);
}

$consulta->close();
$conexion->close();
