<?php
class Vehiculo {
    public $color;
    public $marca;
    public $ruedas;

    public function __construct($color = "Blanco", $marca = "Mercedes") {
        $this->color = $color;
        $this->marca = $marca;
    }

    public function fardar()
    {
        echo "<p>Tengo un $this->marca $this->color y tú no.</p>";
    }
    
    public function encender() {
        echo "<p>El vehículo está encendido.</p>";
    }

    public function tocarBocina() {
        echo "<p>Bip bip!</p>";
    }
}
