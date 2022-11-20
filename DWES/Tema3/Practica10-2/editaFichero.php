<?php
    require("./funciones.php");
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
            $array = array();
            if($fichero = fopen("notas.csv", "r")){
                while(($datos = fgetcsv($fichero, filesize("notas.csv"), ";")) !== false){
                    array_push($array, $datos); 
                }
                fclose($fichero);
            }
    ?>
    <?php
        if(compTodo()){
            
            $array[$_REQUEST["numero"]][1] = $_REQUEST["nota1"];
            $array[$_REQUEST["numero"]][2] = $_REQUEST["nota2"];
            $array[$_REQUEST["numero"]][3] = $_REQUEST["nota3"];

            if($fichero = fopen("notas.csv", "w")){
                foreach($array as $campos){
                    fputcsv($fichero, $campos, ";");
                }
            }
            fclose($fichero);
            header('Location: ./eligeFichero.php');
            exit();
        } else {

    ?>
    <form action="./editaFichero.php" method="post">
        <input type="hidden" name="numero" value="<?php
            echo $_REQUEST["numero"];
        ?>">
        <p>
            <label for="nombre">Nombre: </label>
            <label><?php
                echo $array[$_REQUEST["numero"]][0];
            ?></label>
        <p>
        <p>
            <label for="nota1">Nota 1: </label>
            <input type="text" name="nota1" value="<?php
                echo $array[$_REQUEST["numero"]][1];
            ?>">
            <?php
                if(enviado()){
                    if(vacio("nota1")){
                        echo "<span style='color: red;'><-- Escribe una nota.</span>";
                    } elseif(!compNotas("nota1")){
                        echo "<span style='color: red;'><-- La nota tiene que ser entre 0 y 10.</span>";
                    }
                }
            ?>
        </p>
        <p>
            <label for="nota2">Nota 2: </label>
            <input type="text" name="nota2" value="<?php
                echo $array[$_REQUEST["numero"]][2];
            ?>">
            <?php
                if(enviado()){
                    if(vacio("nota2")){
                        echo "<span style='color: red;'><-- Escribe una nota.</span>";
                    } elseif(!compNotas("nota2")){
                        echo "<span style='color: red;'><-- La nota tiene que ser entre 0 y 10.</span>";
                    }
                }
            ?>
        </p>
        <p>
            <label for="nota3">Nota 3: </label>
            <input type="text" name="nota3" value="<?php
                echo $array[$_REQUEST["numero"]][3];
            ?>">
            <?php
                if(enviado()){
                    if(vacio("nota3")){
                        echo "<span style='color: red;'><-- Escribe una nota.</span>";
                    } elseif(!compNotas("nota3")){
                        echo "<span style='color: red;'><-- La nota tiene que ser entre 0 y 10.</span>";
                    }
                }
            ?>
        </p>
        <input type="submit" name="cambiar" value="cambiar">
    </form>
    <?php
    }
    ?>
    <h2>Ver codigo:</h2>
        <div class="cajalink2">
            <a href="verCodigo.php?valor=eligeFichero.php"><p>Ver codigo eligeFichero</p></a>
        </div>
        <div class="cajalink2">
            <a href="verCodigo.php?valor=editaFichero.php"><p>Ver codigo editaFichero</p></a>
        </div> 
</body>
</html>