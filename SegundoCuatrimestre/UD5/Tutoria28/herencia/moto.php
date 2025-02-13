<?php
include_once("vehiculo.php");

class Moto extends Vehiculo 
{
    public $ruedas = 2;

    public function misRuedas() {
        echo "<p>Tengo $this->ruedas ruedas.</p>";
    }

    public function encender() {
        echo "<p>La moto está encendida.</p>";
    }

    public function fardar()
    {
        echo "<p>Tengo una $this->marca $this->color y tú no.</p>";
    }
}

