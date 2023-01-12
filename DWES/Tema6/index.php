<?php

require_once("./objetos2.php");

$persona1 = new Persona('paco', 56, 'pacoporros@gmail.com');
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

echo $persona1->nombre;
echo $persona1->edad;
echo $persona1->email;

$persona1->edad = 21;
echo $persona1->edad;

echo Persona::$id;

?>