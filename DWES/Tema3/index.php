<h1>Funcion</h1>

<?php

include("./funciones.php");

saludo();
echo "<br>";
saludo2("paco");
echo "<br>";
$nombre = "paco";
saludo3($nombre);
echo "<br>";
echo $nombre;
echo "<br>";
saludo4();
echo "<br>";
echo $nombre;
echo "<br>";
$nombre = "pedro";
$nombre = saludo5($nombre);
echo "<br>";
echo $nombre;
echo "<br>";
$nombre = "pedro";
saludo6($nombre);
echo "<br>";
echo $nombre;
echo "<br>";
$nombre = "pedro";
saludo7();
echo "<br>";
echo $nombre;
echo "<br>";

// pasar un array

$array = array();

rellenaArray($array);
echo "<br>";
var_dump($array);
echo "<br>";
// objetos

class cuadrado{
    public $lado = 5;
}

$objeto = new cuadrado();
cambioLado($objeto, 10);
echo "<br> Objeto: ". $objeto->lado;
