<?php
    require("./funciones/funcionesBD.php");
    require("./funciones/conexionBD.php");
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
    <?
        if(enviado("enviar")){
            crearBD();
        }
        if(enviado("leer")){
            header('Location: ./php/leeBD.php');
        }
        if(enviado("insertar")){
            header('Location: ./php/insertarBD.php');
        }
    ?>
    <form action="./index.php" method="post">
       <? 
     try {
        $conexion = new mysqli();
        $conexion->connect($_SERVER["SERVER_ADDR"],USER,PASS, BBDD);
        } catch (Exception $ex){
            if($ex->getCode() == 1049){
                echo "<span style='color: red;'>La base de datos no existe.</span>";
                $conexion->close();
                ?>
                    <input type="submit" name="enviar" value="crear BD">
                <?
            }
            if($ex->getCode() == 1045){
                echo "<span style='color: red;'>El nombre de usuario o la contraseña no es correcto.</span>";
                $conexion0->close();
            }
            if($ex->getCode() == 2002){
                echo "<span style='color: red;'>Se acabo el tiempo de espera, no hemos podido establecer la conexion.</span>";
                $conexion0->close();
            }
        } finally {
            ?>
                <input type="submit" name="leer" value="leer tabla">
                <input type="submit" name="insertar" value="insertar datos">
            <?
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