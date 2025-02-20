<?php
// class Persona
// {
//     public static $id = 0;
//     private $perfil;
//     public $nombre;
//     public function __construct($nombre = "Genérico")
//     {
//         $this->nombre = $nombre;
//         $this->perfil = "Público";
//         self::$id++;
//     }
// }

class Persona
{
    private $nombre;
    private $perfil;

    public function __construct()
    {
        $num = func_num_args(); //guardamos el número de argumentos
        switch ($num) {
            case 0:
                break;
            case 1:
                //recuperamos el argumento pasado
                $this->nombre = func_get_arg(0); // los argumentos empiezan a contar por 0
                break;
            case 2:
                $this->nombre = func_get_arg(0);
                $this->perfil = func_get_arg(1);
            default:
                echo "Nº de argumentos inválido";
                break;
        }
    }
}

//Ahora será válido el siguiente código.
$persona1 = new Persona();
$persona2 = new Persona("Alicia");
$persona3 = new Persona("Alicia", "Público");
$persona3 = new Persona("Alicia", "Público", "");
var_dump($persona1);
echo "<br>";
var_dump($persona2);
echo "<br>";
var_dump($persona3);

// Creamos un objeto de la clase Persona e inicializamos sus atributos;
// Fíjate que ya NO podremos usar: $persona1=new Persona(); ya que el constructor espera dos parámetros.
$persona1 = new Persona("Juan", "Privado");
//Podemos comprobarlo
var_dump($persona1);


//creamos persona1 que tiene inicializado su atributo $perfil a Público.
$persona1 = new Persona("Pepe", "Público");
// Podemos comprobarlo
var_dump($persona1);
echo "<br>";

//creamos persona1 que tiene inicializado su atributo $perfil a Público.
// $persona2 = new Persona();
// // Podemos comprobarlo
// var_dump($persona2);
// echo "<br>";
// echo $persona2->nombre;
// echo "<br>";
// echo $persona2::$id;
// echo "<br>";
// echo Persona::$id;

class Producto
{
    public static $num_productos = 0;
    private $codigo;
    public function __construct($codigo)
    {
        $this->codigo = $codigo;
        self::$num_productos++;
    }
    public function __destruct()
    {
        self::$num_productos--;
    }

    public function __clone()
    {
        $this->codigo = rand(1, 100);
    }

    public function vende() {}

    public function setNombre($codigo)
    {
        $this->codigo = $codigo;
    }
}
$p = new Producto('GALAXYS');
$p1 = new Producto('GALAXYS');
$p2 = new Producto('GALAXYS');
$p3 = new Producto('GALAXYS');
$p4 = new Producto('GALAXYS');
$p5 = new Producto('GALAXYS');
$p5 = new Producto('GALAXYS');
$p5 = new Producto('GALAXYS');

echo Producto::$num_productos;
echo "<br>";

unset($p);

echo Producto::$num_productos;
echo "<br>";

$p4 = "Destruye";

echo Producto::$num_productos;
echo "<br>";

$p6 = $p5;

echo Producto::$num_productos;
echo "<br>";

echo "La clase es: " . get_class($p3);


if (class_exists('Producto')) {
    //$p = new Producto();
}

//print_r(get_declared_classes());

echo "<br>";
echo Producto::$num_productos;
echo "<br>";

//class_alias('Producto', 'Articulo');
//$p = new Articulo('GALAXYS');

echo Producto::$num_productos;
echo "<br>";

print_r(get_class_methods('Producto'));

echo method_exists('Producto', 'vende') ? "True" : "false";

$p7 = new Producto('ORIGINAL');
var_dump($p7);
$p8 = $p7;
var_dump($p8);
$p7->setNombre("DUPLICADO");
var_dump($p7);
var_dump($p8);

echo "<hr>";
$p9 = clone ($p7);
var_dump($p9);
var_dump($p7);
$p7->setNombre("NUEVO");
echo "<hr>";
var_dump($p9);
var_dump($p7);

echo "<hr>";
$p10 = clone ($p7);
var_dump($p10);
var_dump($p7);
