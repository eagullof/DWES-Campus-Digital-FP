<?php
// Conexión a la base de datos
try {
    $dsn = "mysql:host=localhost;dbname=proyecto;charset=utf8mb4";
    $user = "gestor";
    $pass = "secreto";
    $conProyecto = new PDO($dsn, $user, $pass);
    $conProyecto->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("<p class='text-danger'>Error de conexión: " . $e->getMessage() . "</p>");
}

// Función para generar el botón "Consultar Otro Artículo"
function pintarBoton()
{
    echo "<a href='{$_SERVER['PHP_SELF']}' class='btn btn-success mb-2'>Consultar Otro Artículo</a>";
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Inclusión de Bootstrap para estilos -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">
    <title>Ejercicio Tema 3: Conjuntos de resultados en PDO</title>
</head>
<body style="background: antiquewhite">
<h3 class="text-center mt-2 font-weight-bold">Ejercicio Resuelto</h3>
<div class="container mt-3">
    <?php
    if (isset($_POST['enviar'])) { // Consultar unidades de un producto
        $codProd = intval($_POST['producto']); // Aseguramos que sea un número entero

        // Consultar el nombre del producto
        $consulta1 = "SELECT nombre, nombre_corto FROM productos WHERE id = ?";
        $stmt1 = $conProyecto->prepare($consulta1);
        $stmt1->execute([$codProd]);
        $producto = $stmt1->fetch(PDO::FETCH_ASSOC);

        if (!$producto) {
            die("<p class='text-danger'>Producto no encontrado.</p>");
        }

        // Consultar el stock del producto
        $consulta2 = "SELECT unidades, tienda, producto, tiendas.nombre AS nombreTienda 
                      FROM stocks 
                      JOIN tiendas ON tienda = tiendas.id 
                      WHERE producto = ?";
        $stmt2 = $conProyecto->prepare($consulta2);
        $stmt2->execute([$codProd]);

        echo "<h4 class='mt-3 mb-3 text-center'>Unidades del Producto: {$producto['nombre']} ({$producto['nombre_corto']})</h4>";
        pintarBoton();

        echo "<table class='table table-striped table-dark'>";
        echo "<thead>";
        echo "<tr class='font-weight-bold'><th class='text-center'>Nombre Tienda</th><th>Unidades</th><th class='text-center'>Acciones</th></tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($fila = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr class='text-center'><td>{$fila['nombreTienda']}</td>";
            echo "<td class='text-center m-auto'>";
            echo "<form name='a' action='{$_SERVER['PHP_SELF']}' method='POST' class='form-inline'>";
            echo "<input type='number' class='form-control' step='1' min='0' name='stock' value='{$fila['unidades']}'>";
            echo "<input type='hidden' name='ct' value='{$fila['tienda']}'>";
            echo "<input type='hidden' name='cp' value='{$fila['producto']}'>";
            echo "</td><td>";
            echo "<input type='submit' class='btn btn-warning ml-2' name='enviar1' value='Actualizar'>";
            echo "</form>";
            echo "</td></tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } elseif (isset($_POST['enviar1'])) { // Actualizar el stock de un producto
        $codTienda = intval($_POST['ct']);
        $codProducto = intval($_POST['cp']);
        $unidades = intval($_POST['stock']);

        // Actualizar el stock
        $update = "UPDATE stocks SET unidades = ? WHERE producto = ? AND tienda = ?";
        $stmt = $conProyecto->prepare($update);

        if ($stmt->execute([$unidades, $codProducto, $codTienda])) {
            echo "<p class='font-weight-bold text-success mt-3'>Unidades Actualizadas Correctamente</p>";
        } else {
            echo "<p class='text-danger'>Error al actualizar las unidades.</p>";
        }
        pintarBoton();
    } else { // Mostrar formulario inicial
        ?>
        <form name="f1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="p" class="font-weight-bold">Elige un producto</label>
                <select class="form-control" id="p" name="producto">
                    <?php
                    // Consultar productos disponibles
                    $consulta = "SELECT id, nombre, nombre_corto FROM productos ORDER BY nombre";
                    foreach ($conProyecto->query($consulta) as $fila) {
                        echo "<option value='{$fila['id']}'>{$fila['nombre']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mt-2">
                <input type="submit" class="btn btn-info mr-3" value="Consultar Stock" name="enviar">
            </div>
        </form>
        <?php
    }
    ?>
</div>
</body>
</html>
