<?php

echo "El nombre es: ". $_REQUEST["nombre"];
echo "<br> Contraseña: ". $_REQUEST["pass"];
if(isset($_REQUEST["genero"])){
    echo "<br> Genero: ". $_REQUEST["genero"];
} else {
    echo "<br> No se ha elegido genero";
}
if(isset($_REQUEST["asig"])){
    echo "<br> las asignaturas elegidas son: ";
    foreach($_REQUEST["asig"] as $key){
    echo "<br>$key";
    }
} else {
    echo "<br>No se ha pasado ningun parametro";
}

print_r($_REQUEST);
echo "<br>";
print_r($_FILES);
echo "<br>";
$ubicacion = "/var/www/html";
$nombretemp = "hola";
if(move_uploaded_file($_FILES['fichero']['tmp_name'], $ubicacion)){
    echo "<br>Fichero subido correctamente";
} else {
    echo "<br>No tira mi pana";
}
?>