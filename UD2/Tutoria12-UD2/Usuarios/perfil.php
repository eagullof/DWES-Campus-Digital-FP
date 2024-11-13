<?php
require 'funciones_usuario.php';

if (!esUsuarioAutenticado()) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Bienvenido, <?= htmlspecialchars($usuario['nombre']); ?></h1>
        <p>Usuario: <?= htmlspecialchars($usuario['username']); ?></p>
        <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
    </div>
</body>
</html>
