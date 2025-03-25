<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.html');
    exit;
}

$conexion = new mysqli("localhost", "gestor", "secreto", "proyecto");
$resultado = $conexion->query("SELECT nombre, pvp FROM productos");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
</head>

<body>
    <h2>Listado de productos disponibles</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($producto = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($producto['nombre']) ?></td>
                    <td><?= htmlspecialchars($producto['pvp']) ?>€</td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <form action="logout.php" method="post">
        <button type="submit">Cerrar Sesión</button>
    </form>
</body>

</html>

<?php $conexion->close(); ?>