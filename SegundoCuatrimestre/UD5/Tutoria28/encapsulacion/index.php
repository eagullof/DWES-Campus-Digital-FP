<?php
class Persona
{
    private $nombre;
    protected $colorPelo;

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
}

class Mujer extends Persona
{
    public $altura;

    public function setColorPelo($colorPelo)
    {
        $this->colorPelo = $colorPelo;
    }

    public function getColorPelo()
    {
        return $this->colorPelo;
    }
}

$persona = new Persona();
$persona->setNombre("Juan");
echo $persona->getNombre(); // Salida: Juan

$mujer = new Mujer();
$mujer->setNombre("Esther");
echo "<hr>";
echo $mujer->getNombre();
$mujer->setColorPelo("Marrón");
echo "<hr>";
echo $mujer->getColorPelo();
echo "<hr>";
$mujer->altura = 173;
echo $mujer->altura;
