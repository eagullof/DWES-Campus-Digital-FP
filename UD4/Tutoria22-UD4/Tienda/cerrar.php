<?php
//Para persistir el carrito, podemos almacenarlo en la base de datos al cerrar sesión y recuperarlo al inicicarla.
session_start();
unset($_SESSION['nombre']);
unset($_SESSION['cesta']);
header('Location:login.php');