<?php
    require("./funciones.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../../CSS/estilos.css">
    <title>Document</title>
</head>
<body>
    <?php
        include_once("../../../cabecera.html");
    ?>
    <?php
    if(enviado()){
            if($fichero = fopen($_REQUEST["fichero"], "w")){
                $nText = $_REQUEST["area"];
                fwrite($fichero, $nText, strlen($nText));
                fclose($fichero);
            }
            header('Location: ./leeFichero.php?fichero='.$_REQUEST["fichero"]);
            exit();
    }
    ?>
    <form action="./editaFichero.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="fichero" value="<?php
        echo $_REQUEST["fichero"];
        ?>">
        <textarea name="area" rows="10" cols="30"><?php
            if(file_exists($_REQUEST["fichero"])){
                if($fichero = fopen($_REQUEST["fichero"], "r+")){
                    while($leer = fgets($fichero, filesize($_REQUEST["fichero"]))){
                        echo $leer;
                    }
                    fclose($fichero);
                }
            } else {
                if($fichero = fopen($_REQUEST["fichero"], "w")){
                    fclose($fichero);
                }
                
            }
            ?>
        </textarea>
        <br>
        <input type="submit" name="leer" value="modificar">
    </form>
    
</body>
</html>