<?php
    require("./funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../CSS/estilos.css">
    <title>Document</title>
</head>
<body>
    <?php
        include_once("../../../cabecera.html");
    ?>
    <?php
        if(enviado()){
            if(existe("leer")) {
                if(file_exists($_REQUEST["fichero"])){
                    header('Location: ./leeFichero.php?fichero='.$_REQUEST["fichero"]);
                }     
            } else if(existe("editar")){
                header('Location: ./editaFichero.php?fichero='.$_REQUEST["fichero"]);
            }
        }
    ?>
    <form action="./eligeFichero.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="idFichero">Nombre fichero: </label>    
            <input type="text" name="fichero" id="idFichero" placeholder="fichero" value=
            "<?php
                if(enviado() && !vacio("fichero")){
                    echo $_REQUEST["fichero"];
                }
            ?>"
            >
            <?php
                if(enviado()){
                    if(existe("leer")){
                        if(!file_exists($_REQUEST["fichero"])){
                            echo "<span style='color: red;'>El fichero no existe</span>";
                        }
                    }
                }
            ?>
        </p>
        <input type="submit" value="editar" name="editar">
        <input type="submit" value="leer" name="leer">
    </form>

</body>
</html>