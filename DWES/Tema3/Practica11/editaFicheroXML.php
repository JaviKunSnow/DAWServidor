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
        $dom = simplexml_load_file("notas.xml");
    ?>
    <?php
        if(compTodo()){
            
            $dom->children()[intval($_REQUEST["numero"])]->children()[1] = $_REQUEST["nota1"];
            $dom->children()[intval($_REQUEST["numero"])]->children()[2] = $_REQUEST["nota2"];
            $dom->children()[intval($_REQUEST["numero"])]->children()[3] = $_REQUEST["nota3"];

            $dom->saveXML("notas.xml");

            header('Location: ./leeFicheroXML.php');
            exit(); 
        } else {

    ?>
    <form action="./editaFicheroXML.php" method="post">
        <input type="hidden" name="numero" value="<?php
            echo $_REQUEST["numero"];
        ?>">
        <p>
            <label for="nombre">Nombre: </label>
            <label><?php
                echo $dom->children()[intval($_REQUEST["numero"])]->children()[0];
            ?></label>
        <p>
        <p>
            <label for="nota1">Nota 1: </label>
            <input type="text" name="nota1" value="<?php
                echo $dom->children()[intval($_REQUEST["numero"])]->children()[1];
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
                echo $dom->children()[intval($_REQUEST["numero"])]->children()[2];
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
                echo $dom->children()[intval($_REQUEST["numero"])]->children()[3];
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