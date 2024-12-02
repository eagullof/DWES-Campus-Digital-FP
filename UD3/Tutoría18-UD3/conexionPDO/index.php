<?php

$host = "localhost";
$db = "proyecto";
$user = "gestor";
$pass = "secreto";
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$conProyecto = new PDO($dsn, $user, $pass);

$version = $conProyecto->getAttribute(PDO::ATTR_SERVER_VERSION);
echo "Versión del servidor: $version";

$conProyecto->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
$conProyecto->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$conProyecto = null;