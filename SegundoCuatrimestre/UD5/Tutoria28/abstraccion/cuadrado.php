<?php
include_once("figura.php");

class Cuadrado extends Figura
{
    private $lado;

    public function __construct($lado)
    {
        $this->lado = $lado;
    }

    public function calcularArea()
    {
        return $this->lado * $this->lado;
    }
}
