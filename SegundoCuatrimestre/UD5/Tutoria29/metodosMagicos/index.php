<?php

//Lo hemos visto anteriormente en herencia
class Animal
{
    protected $patas = 2;
    public function hacerSonido()
    {
        echo "<p>Sonido genérico</p>";
    }
}

class Perro extends Animal
{
    private $atributos = array();
    public function __get($atributo)
    {
        return $this->atributos[$atributo];
    }
    public function __set($atributo, $valor)
    {
        $this->atributos[$atributo] = $valor;
    }

    public function setPatas($valor)
    {
        $this->patas = $valor;
    }

    public function __toString()
    {
        return "Mi perro tiene " . $this->patas . " patas y pelo blanco.";
    }

    public function hacerSonido()
    {
        echo "<p>Guau guau</p>";
    }
}

$miPerro = new Perro();
$miPerro->hacerSonido(); // Salida: Guau guau
$miPerro->prueba = "prueba";
echo $miPerro->prueba . "<br>";
$miPerro->setPatas(4);
echo $miPerro;
