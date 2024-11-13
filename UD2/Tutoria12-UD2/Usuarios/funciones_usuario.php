<?php
session_start();

function cargarUsuarios() {
    $_SESSION["usuarios"]["admin"] = ['password' => '1234', 'nombre' => 'Administrador'];
}

function autenticarUsuario($usuario, $password) {
    cargarUsuarios();
    
    if (isset($_SESSION["usuarios"][$usuario]) && $_SESSION["usuarios"][$usuario]['password'] === $password) {
        $_SESSION['usuario'] = [
            'nombre' => $_SESSION["usuarios"][$usuario]['nombre'],
            'username' => $usuario,
        ];
        return true;
    }
    return false;
}

function registrarUsuario($usuario, $password, $nombre) {
    if (isset($_SESSION['usuarios'][$usuario])) {
        return false; // Usuario ya existe.
    }
    
    // Guardamos el nuevo usuario en la sesión.
    $_SESSION['usuarios'][$usuario] = [
        'password' => $password,
        'nombre' => $nombre,
    ];
    
    // Iniciamos la sesión
    $_SESSION['usuario'] = [
        'nombre' => $nombre,
        'username' => $usuario,
    ];
    
    return true;
}

function esUsuarioAutenticado() {
    return isset($_SESSION['usuario']);
}

function cerrarSesion() {
    unset($_SESSION['usuario']);
}
?>
