<?php

require("conexionBD.php");
require("funcionesBD.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../../../CSS/estilos.css">
</head>
<body>
    <?php
        include_once("../../../cabecera.html");
    ?>
    <?php

       if(enviado()){
            crearBD();
        }
    ?>
    <form action="./index.php" method="post" enctype="multipart/form-data">
       <?php 
        try {
            $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname='.BBDD, USER, PASS);

            ?>

            <div class="cajalink2">
                <a href="php/leeBD.php"><p>Leer datos</p></a>
            </div>
            <div class="cajalink2">
                <a href="php/editaBD.php?opc=ins"><p>Insertar datos</p></a>
            </div> 

            <?php

            } catch (Exception $ex){
                if($ex->getCode() == 1049){
                    echo "<span style='color: red;'>La base de datos no existe.</span>";
                    echo "<input type='submit' name='enviar' value='crear BD'>";    
                    
                }
                if($ex->getCode() == 1045){
                    echo "<span style='color: red;'>El nombre de usuario o la contraseña no es correcto.</span>";

                }
                if($ex->getCode() == 2002){
                    echo "<span style='color: red;'>Se acabo el tiempo de espera, no hemos podido establecer la conexion.</span>";
                    
                }
            }
        ?>
    </form>
    <h2>Ver codigo:</h2>
        <div class="cajalink2">
            <a href="verCodigo.php?valor=eligeFichero.php"><p>Ver codigo eligeFichero</p></a>
        </div>
        <div class="cajalink2">
            <a href="verCodigo.php?valor=editaFichero.php"><p>Ver codigo editaFichero</p></a>
        </div> 
</body>
</html>