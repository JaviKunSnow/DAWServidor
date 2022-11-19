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
            if(existe("editar")){
                header('Location: ./editaFichero.php?fichero='.$_REQUEST["fichero"]);
            exit();            
            }
        }
    ?>
    <form action="./leeFichero.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="fichero" value="<?php
        echo $_REQUEST["fichero"];
        ?>">
        <textarea name="area" rows="10" cols="30"><?php
                if($fichero = fopen($_REQUEST["fichero"], "r")){
                    if(filesize($fichero) == 0){
                        echo "<span style:'color: red;'>El fichero esta vacio</span>";
                    } else {
                        while($leer = fgets($fichero, filesize($_REQUEST["fichero"]))){
                            echo $leer;
                        }
                    }
                    fclose($fichero);
                }
                
            ?>
        </textarea>
        <br>
        <input type="submit" value="editar" name="editar">
    </form>
</body>
</html>