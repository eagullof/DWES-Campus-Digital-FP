<?php
include_once("vehiculo.php");

class Coche extends Vehiculo 
{
    public $ruedas = 4;

    public function misRuedas() {
        echo "<p>Tengo $this->ruedas ruedas.</p>";
    }
    
    public function encender() {
        echo "<p>El coche está encendido.</p>";
    }
}