<?php

require("./conexionBD.php");
require("./funcionesBD.php");

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
            $conexion1 = mysqli_connect($_SERVER["SERVER_ADDR"],USER,PASS);
            $script = crearBD();
            mysqli_multi_query($conexion1, $script);
            $conexion1->close();

            echo "<a href='funciones/editaBD.php'>Editar base de datos</a>";
            echo "<a href='funciones/leeBD.php'>Leer base de datos</a>";
        }
    ?>
    <form action="./index.php" method="post" enctype="multipart/form-data">
       <?php 
        try {
            $conexion = mysqli_connect("192.168.1.106", USER, PASS, BBDD);

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