<?php
interface iMuestra {
    public function muestra();
}

class Producto implements iMuestra, Countable {
    public $codigo;
    public $nombre;
    public $nombre_corto;
    public $pvp;

    public function muestra(){
        echo "<p>" . $this->codigo . "</p>";
    }

    public function mostrarPrecio() {
        echo $pvp;
    }

    public function count(){
        echo "muchos productos";
    }
}

class TV extends Producto {
    public function muestra() {
        echo "<p>" . $this->codigo . "</p>";
    }
}