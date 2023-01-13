<?php

require_once("./objetos2.php");


//var_dump($persona1);
/*
$persona1->setNombre('pepe');
//var_dump($persona1);
echo $persona1;

$persona2 = clone $persona1;
$persona1->setEdad(69);
echo $persona2;

// diferenciar objetos con mismos valores

if($persona1 == $persona2) {
    echo "tienen los mismos valores";
} 
if($persona1 === $persona2) {
    echo "es el mismo";
}
*/
$persona1 = new Persona('paco', 56, 'pacoporros@gmail.com');
$persona2 = new Persona('paco', 21, 'pacoporros@gmail.com');

echo $persona1->nombre;
echo $persona1->edad;
echo $persona1->email;

$persona1->edad = 21;
echo $persona1->edad;

echo Persona::$id;
echo Persona::elProximoId();

echo "<br>Propiedades que existen:";
print_r(get_class_vars("Persona"));
print_r($persona1->verVariables());
echo "<br>";
echo $persona1->nombr;
echo "<br>";
setcookie('objeto', serialize($persona1));
echo $_COOKIE['objeto'];
echo "<br>";
var_dump(unserialize($_COOKIE['objeto']));
?>