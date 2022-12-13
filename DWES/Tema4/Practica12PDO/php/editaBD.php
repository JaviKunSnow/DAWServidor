<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../../CSS/estilos.css">
</head>
<body>
    <?php

        require("../conexionBD.php");
        require("../funcionesBD.php");

    ?>
    <?php
        include_once("../../../../cabecera.html");
    ?>
    <?php

        if($_REQUEST["opc"] == "elm"){
            eliminarDatos();

            header("Location: ./leeBD.php");

        } else if(enviadoGuardar() && compTodo()){
            if($_REQUEST["opc"] == "mod"){
                modificarDatos();
                
                header("Location: ./leeBD.php");
                exit();

            } else if($_REQUEST["opc"] == "ins"){
                try {
                    $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,BBDD);

                    $script = "insert into `LosAngelesLakers` (`jugador`, `edad`, `puntos`, `asistencias`, `rebotes`, `fechadebut`) values ('".$_REQUEST["jugador"]."','".$_REQUEST["edad"]."','".$_REQUEST["puntos"]."','".$_REQUEST["asistencias"]."','".$_REQUEST["rebotes"]."','".$_REQUEST["fecha"]."');";
                    
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
        }    
    ?>
    <?php
            try {
                    
                $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,BBDD);
                
                if ($_REQUEST["opc"] == "mod"){
                    $sql="select * from LosAngelesLakers where id='". $_REQUEST["numeroID"] ."';";
                    $resultado= mysqli_query($conexion,$sql);

                    while($fila = mysqli_fetch_array($resultado)){
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
            echo $_REQUEST["numeroID"];
        ?>">

        <p>
            <label for="jugador">Jugador: </label>
            <input type="text" name="jugador" id="jugador" value="<?php
                echo $jugador;
            ?>">
        </p>
        <p>
            <label for="edad">Edad: </label>
            <input type="number" name="edad" id="edad" value="<?php
                echo $edad;
            ?>">
        </p>
        <?php
            if(enviadoGuardar()){
                if(!compEdad("edad")){
                    echo "<span style='color: red;'><-- edad incorrectos</span>";
                }
            }
            ?>
        <p>
            <label for="puntos">PPP: </label>
            <input type="number" step="0.1" name="puntos" id="puntos" value="<?php
                echo $puntos;
            ?>">
            <?php
                if(enviadoGuardar()){
                    if(!compStats("puntos")){
                        echo "<span style='color: red;'><-- valores incorrectos</span>";
                    }
                }
            ?>
        </p>
        <p>
            <label for="asistencias">APP: </label>
            <input type="number" step="0.1" name="asistencias" id="asistencias" value="<?php
                echo $asistencias;
            ?>">
            <?php
                if(enviadoGuardar()){
                    if(!compStats("asistencias")){
                        echo "<span style='color: red;'><-- valores incorrectos</span>";
                    }
                }
            ?>
        </p>
        <p>
            <label for="rebotes">RPP: </label>
            <input type="number" step="0.1" name="rebotes" id="rebotes" value="<?php
                echo $rebotes;
            ?>">
            <?php
                if(enviadoGuardar()){
                    if(!compStats("rebotes")){
                        echo "<span style='color: red;'><-- valores incorrectos</span>";
                    }
                }
            ?>
        </p>
        <p>
            <label for="fecha">Fecha Debut: </label>
            <input type="text" name="fecha" id="fecha" value="<?php
                echo $fecha;
            ?>">
            <?php
                if(enviadoGuardar()){
                    if(!compFecha("fecha")){
                        echo "<span style='color: red;'><-- Fecha incorrecta</span>";
                    }
                }
            ?>
        </p>
        <input type="submit" name="guardar" value="Guardar datos">

    </form>
</body>
</html>