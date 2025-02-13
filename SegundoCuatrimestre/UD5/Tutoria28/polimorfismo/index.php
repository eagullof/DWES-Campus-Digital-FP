<?php

//Lo hemos visto anteriormente en herencia
class Animal
{
    public function hacerSonido()
    {
        echo "<p>Sonido genérico</p>";
    }
}

class Perro extends Animal
{
    public function hacerSonido()
    {
        echo "<p>Guau guau</p>";
    }
}

$miPerro = new Perro();
$miPerro->hacerSonido(); // Salida: Guau guau
