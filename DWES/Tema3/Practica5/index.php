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
        $datos = [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];

        echo "<h2>1. Escribe un programa que dado un array ordenalo y devuelve otro array: </h2>";
        $datosResultado = array_unique($datos);
        echo "<p>Array sin ordenar y con elementos repetidos: </p>";
        echo "<br>";
        foreach($datos as $valor){
            echo $valor. " - ";
        }
        
        echo "<p>Array ordenado: </p>";
        echo "<br>";
        sort($datosResultado);
        foreach($datosResultado as $key => $valor){
            echo $valor. " - ";
        }
        
        echo "<h2>2. Escribe un programa que dado un array devuelva la posicion donde haya el valor 3 y cambie el valor por la posicion: </h2>";
        foreach($datos as $key => $valor){
            if($valor == 3){
                $posicion = $key;
                array_splice($datos, $key, 1, $key);
            }
        }
        echo "<p>Array con el valor 3 cambiado: </p>";
        echo "<br>";
        foreach($datos as $valor){
            echo $valor. " - ";
        }

        echo "<h2>3. Escribe un programa que pida por pantalla el tamaño de una matriz: </h2>";
        

        
    ?>
</body>
</html>