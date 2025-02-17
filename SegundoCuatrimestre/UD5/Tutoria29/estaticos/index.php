<?php
class Producto
{
    private static $num_productos = 0;
    function __construct()
    {
        self::$num_productos++;
    }

    public function getProductos()
    {
        echo self::$num_productos;
    }
}

$miProducto = new Producto();
$miProducto = new Producto();
$miProducto = new Producto();
$miProducto = new Producto();
$miProducto = new Producto();

$miProducto->getProductos();
