<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Practica 4</title>
    <link rel="stylesheet" href="../../../CSS/estilos.css">
</head>
<body>
    <?php
        include_once("../../../cabecera.html");
    ?>
    <?php
        
        include("./funciones.php");
        
        echo "<h2>Pinta un br: </h2>";
        br();
        echo "<h2>Cadena de h1: </h2>";
        $valor = "hola";
        h1($valor);
        br();
        echo "<h2>Cadena de p: </h2>";
        p($valor);
        br();
        echo "<h2>devuelve el fichero actual: </h2>";
        myself();
        br();
        echo "<h2>introduce el dni y devuelve la letra: </h2>";
        $dni = "71050002N";
        dni($dni);
        br();
    ?>
</body>
</html>