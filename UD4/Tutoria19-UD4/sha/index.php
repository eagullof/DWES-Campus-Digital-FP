
<?php
// Contraseña ingresada por el usuario
$contraseña_ingresada = 'secreto';

// Hash almacenado en la base de datos (ejemplo)
$hash_almacenado = 'df733656293a19c54f69093ba916f0a1a2a3c151fc95c13f3a794c2631eeb3a6'; // SHA256 de "secreto"

echo hash('sha256', $contraseña_ingresada);
echo '<br>';
// Comparar hash de la contraseña ingresada con el almacenado
if (hash('sha256', $contraseña_ingresada) === $hash_almacenado) {
    echo "Autenticación exitosa.";
} else {
    echo "Credenciales incorrectas.";
}
?>

