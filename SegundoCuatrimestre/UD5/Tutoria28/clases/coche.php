<?php
class Coche
{
    public $color;
    public $marca;

    public function __construct($color = "Blanco", $marca = "Mercedes")
    {
        $this->color = $color;
        $this->marca = $marca;
    }

    public function fardar()
    {
        echo "<p>Tengo un $this->marca $this->color y tú no.</p>";
    }

    public function arrancar()
    {
        echo "<p>El coche ha arrancado.</p>";
    }
}
