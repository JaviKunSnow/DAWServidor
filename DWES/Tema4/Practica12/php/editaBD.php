<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        require("../conexionBD.php");
        require("../funcionesBD.php");

    ?>
    <?php

        if($_REQUEST["opc"] == "elm"){
            try {
                $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,BBDD);

                $script = "delete from losAngelesLakers where id='".$_REQUEST["id"]."';";

                mysqli_query($conexion, $script);
                mysqli_close($conexion);
            
            } catch (Exception $ex) {
                if ($ex->getCode()==1045){
                    echo "Credenciales incorrectas";
                }
                if ($ex->getCode()==2002){
                    echo "Acabado tiempo de conexión";
                }       
                if ($ex->getCode()==1049){
                    echo "No existe la base de datos no existe";
                }       
            }  

            header("Location: ./leeBD.php");
        } else if(enviadoGuardar()){
            if($_REQUEST["opc"] == "mod"){
                try {
                    $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,BBDD);

                    $script = "update into losAngelesLakers set jugador='".$_REQUEST["jugador"]."', edad='".$_REQUEST["edad"]."', puntos='".$_REQUEST["puntos"]."', 
                    asistencias='".$_REQUEST["asistencias"]."', rebotes='".$_REQUEST["rebotes"]."', fechadebut='".$_REQUEST["fecha"]."';";
                
                    mysqli_query($conexion, $script);
                    mysqli_close($conexion);

                } catch (Exception $ex) {
                    if ($ex->getCode()==1045){
                        echo "Credenciales incorrectas";
                    }
                    if ($ex->getCode()==2002){
                        echo "Acabado tiempo de conexión";
                    }       
                    if ($ex->getCode()==1049){
                        echo "No existe la base de datos no existe";
                    }       
                }
                
                header("Location: ./leeBD.php");
            }
        } else if($_REQUEST["opc"] == "int"){
                try {
                    $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,BBDD);

                    $script = "insert into losAngelesLakers values ('".$_REQUEST["jugador"]."','".$_REQUEST["edad"]."','".$_REQUEST["puntos"]."',
                    '".$_REQUEST["asistencias"]."','".$_REQUEST["rebotes"]."','".$_REQUEST["fecha"]."');";
                
                    mysqli_query($conexion, $script);
                    mysqli_close($conexion);
                
                } catch (Exception $ex) {
                    if ($ex->getCode()==1045){
                        echo "Credenciales incorrectas";
                    }
                    if ($ex->getCode()==2002){
                        echo "Acabado tiempo de conexión";
                    }       
                    if ($ex->getCode()==1049){
                        echo "No existe la base de datos no existe";
                    }       
                }
                
                header("Location: ./leeBD.php");
            }    
    ?>
    <?php
            try {
                    
                $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,BBDD);
                
                if ($_REQUEST["opc"]=="mod"){
                    $sql="select * from losAngelesLakers where id='" . $_REQUEST["numeroID"] . "';";
                    $resultado= mysqli_query($conexion,$sql);

                    while($fila = $resultado->fetch_array()){
                        $jugador = $fila["jugador"];
                        $edad = $fila["edad"];
                        $puntos = $fila["puntos"];
                        $asistencias = $fila["asistencias"];
                        $rebotes = $fila["rebotes"];
                        $fecha = $fila["fechadebut"];
                    }
                }
                    mysqli_close($conexion);
        
            } catch (Exception $ex) {
                if ($ex->getCode()==1045){
                    echo "Credenciales incorrectas";
                }
                if ($ex->getCode()==2002){
                    echo "Acabado tiempo de conexión";
                }       
                if ($ex->getCode()==1049){
                    echo "No existe la base de datos no existe";
                }       
            }     
    ?>
    <form action="editaBD.php" method="post">
        <input type="hidden" name="opc" value="<?php
            echo $_REQUEST["opc"];
        ?>">

        <input type="hidden" name="id" value="<?php
        if($_REQUEST["opc"] == "mod"){
            echo $_REQUEST["numeroID"];
        }
        ?>">


        <label for="jugador">Jugador: </label>
        <input type="text" name="jugador" id="jugador" value="<?php
        if($_REQUEST["opc"] == "mod"){
            echo $jugador;
        }
        ?>">
        <label for="edad">Edad: </label>
        <input type="number" name="edad" id="edad" value="<?php
        if($_REQUEST["opc"] == "mod"){
            echo $edad;
        }
        ?>">
        <label for="puntos">PPP: </label>
        <input type="number" name="puntos" id="puntos" value="<?php
        if($_REQUEST["opc"] == "mod"){
            echo $puntos;
        }
        ?>">
        <label for="asistencias">APP: </label>
        <input type="number" name="asistencias" id="asistencias" value="<?php
        if($_REQUEST["opc"] == "mod"){
            echo $asistencias;
        }
        ?>">
        <label for="rebotes">RPP: </label>
        <input type="number" name="rebotes" id="rebotes" value="<?php
        if($_REQUEST["opc"] == "mod"){
            echo $rebotes;
        }
        ?>">
        <label for="fecha">Fecha Debut: </label>
        <input type="text" name="fecha" id="fecha" value="<?php
        if($_REQUEST["opc"] == "mod"){
            echo $fecha;
        }
        ?>">
        <input type="submit" name="guardar" value="Guardar datos">

    </form>
</body>
</html>