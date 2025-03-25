<?php
// Conexión a la base de datos "proyecto"
$host = "localhost";
$db = "proyecto";
$user = "gestor";
$pass = "secreto";
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $conProyecto = new PDO($dsn, $user, $pass);
    $conProyecto->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    die("Error en la conexión: " . $ex->getMessage());
}

// Verificar que la petición sea POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener y sanitizar entrada
    $usuario = isset($_POST["email"]) ? trim($_POST["email"]) : "";

    // Validar formato del email
    if (filter_var($usuario, FILTER_VALIDATE_EMAIL)) {
        // Preparar consulta segura con parámetros
        $stmt = $conProyecto->prepare("INSERT INTO usuarios (usuario, pass) VALUES (:usuario, :pass)");

        // Ejecutar consulta con parámetros
        try {
            $stmt->execute([
                ':usuario' => $usuario,
                ':pass' => password_hash('abc', PASSWORD_DEFAULT) // la contraseña debería estar hasheada
            ]);
            echo "Usuario añadido correctamente.";
        } catch (PDOException $ex) {
            echo "Error al insertar usuario: " . $ex->getMessage();
        }
    } else {
        echo "Email inválido.";
    }
} else {
    http_response_code(405);
    echo "Método no permitido.";
}

// Cerrar la conexión
$stmt = null;
$conProyecto = null;
