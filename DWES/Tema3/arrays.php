<?php

// arrays

// array con datos

$meses = array("Enero", "Febrero", "Marzo");
echo "<pre>";
echo var_dump($meses);
echo "</pre>";

// array de longitud

$dias = array(7);

echo "<pre>";
echo var_dump($dias);
echo "</pre>";

// sintaxis corta

$notas = [2.3, 5.3];

echo "<pre>";
echo var_dump($notas);
echo "</pre>";

// ACCEDER O MODIFICAR

echo $meses[2];
echo "<br>";
echo count($meses);
echo "<br>";

echo "<p>BUCLE FOREACH</p>";
foreach($meses as $valor){
    echo $valor;
    echo "<br>";
}

echo "<p>BUCLE FOR</p>";
for($i = 0; $i < count($meses); $i++){
    echo $meses[$i];
    echo "<br>";
}

//ASIGNAR VALORES
echo "<p>NUEVO MES</p>";
$meses[3] = "Abril";
for($i = 0; $i < count($meses); $i++){
    echo $meses[$i];
    echo "<br>";
}

echo "<p>MES EN POSICIONES INCORRECTAS</p>";
$meses[5] = "Junio";
$meses[6] = "Julio";
for($i = 0; $i < count($meses); $i++){
    echo $meses[$i];
    echo "<br>";
}
echo "<p>AÑADIR MES</p>";
array_push($meses, "Agosto");
foreach ($meses as $key) {
    echo $key;
    echo "<br>";
}
echo "<p>QUITAR MES AL FINAL</p>";
array_pop($meses);
foreach ($meses as $key) {
    echo $key;
    echo "<br>";
}
echo "<p>QUITAR MES AL PRINCIPIO</p>";
unset($meses[0]);
foreach ($meses as $key) {
    echo $key;
    echo "<br>";
}

$notas = array("Paco"=>2, "Jose Carlos"=>8, "Manuel"=> 1);
print_r($notas);

echo "<br>Nota ". $notas["Paco"];
echo "<br>";

foreach($notas as $alumno => $nota){
    echo "El/la alumno/a " . $alumno . " tiene la nota de un: " .$nota;
    echo "<br>";
}

echo "<p>array multidimensional</p>";
$multi = array(array(),array());
echo var_dump($multi);

echo "<br>";

$asignaturas = array(
    "DAM" => array("PROG"=> "Programacion", "LM"=> "Lenguaje de Marcas"),
    "DAW2" => array("DWES"=> "Servidor","DWEC"=> "Cliente")
);

foreach($asignaturas as $nombre => $valor2){
    echo "<br>El curso de ". $nombre . " tiene: ";
    foreach($valor2 as $curso => $valor){
        echo "<br>". $curso . " = " . $valor;
    } 
}

echo "<h1>Funciones</h1>";
echo "current ". current($notas);
echo "Ultimo ". end($notas);
echo "current ". current($notas);
reset($notas);
echo "current ". current($notas);
echo "clave ". key($notas);
reset($notas);
?>