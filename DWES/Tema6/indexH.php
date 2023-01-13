<?php

require_once("./alumno.php");
require_once("./abstractas.php");
require_once("./abstractaH1.php");
require_once("./abstractaH2.php");

$a = new Alumno('paco', 13, 'pacoporros@gmail.com', '1ºESO');
echo $a;
echo "<br>";
$a->darBaja();
echo $a;

// $nueva = new Abstracta();
// $nueva = new AbsH1();

$nueva = new AbsH2();
$nueva->muestra();
$nueva->soy();
$nueva->soy2();
?>