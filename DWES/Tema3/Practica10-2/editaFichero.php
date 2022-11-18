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

    <form action="./editaFichero.php" method="post">
        <?php
            $array;
            $cont = 0;
            if($fichero = fopen("notas.csv", "r")){
                $array = array();
                while(($datos = fgetcsv($fichero, filesize("notas.csv"), ";")) !== false){
                    array_push($array, $datos); 
                }
                fclose($fichero);
            }
        ?>
        <p>
            <label for="nombre">Nombre: </label>
            <label><?php
                echo $array[$_REQUEST["numero"]][$cont++];
            ?></label>
        <p>
        <p>
            <label for="nota1">Nota 1: </label>
            <input type="text" name="nota1" value="<?php
                echo $array[$_REQUEST["numero"]][$cont++];
            ?>">
        </p>
        <p>
            <label for="nota2">Nota 2: </label>
            <input type="text" name="nota2" value="<?php
                echo $array[$_REQUEST["numero"]][$cont++];
            ?>">
        </p>
        <p>
            <label for="nota3">Nota 3: </label>
            <input type="text" name="nota3" value="<?php
                echo $array[$_REQUEST["numero"]][$cont++];
            ?>">
        </p>
        <input type="submit" name="cambiar" value="cambiar">
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