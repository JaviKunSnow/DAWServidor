<?php

require("../funciones/conexionBD.php");
require("../funciones/funcionesBD.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../style/estilos.css">
</head>
<body>
    
        <div class="cajalink2">
            <a href="editaBD.php?opc=ins">
                <p>Insertar datos</p>
            </a>
        </div>
        <br>
        <br>
        <h2>Ver codigo:</h2>
        <div class="cajalink2">
            <a href="verCodigo.php?valor=eligeFichero.php">
                <p>Ver codigo eligeFichero</p>
            </a>
        </div>
        <div class="cajalink2">
            <a href="verCodigo.php?valor=editaFichero.php">
                <p>Ver codigo editaFichero</p>
            </a>
        </div>
</body>
</html>