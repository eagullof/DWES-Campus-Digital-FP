<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    @$conProyecto = new mysqli('localhost', 'gestor', 'secreto', 'proyecto');
    $error = $conProyecto->connect_errno;
    if ($error == null) {
        $resultado = $conProyecto->query('DELETE FROM stocks WHERE unidades=0');
        if ($resultado) {
            echo "<p>Se han borrado {$conProyecto->affected_rows} registros.</p>"; //$conProyecto->affected_rows me dará las filas afectadas por la sentencia inmediatamente anterior.
        }

        $resultado = $conProyecto->query('SELECT producto, unidades FROM stocks');
        var_dump($resultado);
        // Verificar si hay resultados
        if ($resultado && $resultado->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Producto</th><th>Unidades</th></tr>";

            // Iterar sobre los resultados
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($fila['producto']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['unidades']) . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No se encontraron datos en la tabla de stocks.";
        }

        $resultado->free();
    }
    ?>
</body>

</html>