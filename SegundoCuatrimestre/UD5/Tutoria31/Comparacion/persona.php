<?php
class Persona{
    public $nombre;
    public $apellidos;
    public $perfil;
    public function __toString() :String{
        return "{$this->apellidos}, {$this->nombre}, Tu pérfil es: {$this->perfil}";
     }
}
    
