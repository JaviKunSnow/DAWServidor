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
            if(existe("fichero")){
                if(existe("editar")){
                        header("location: ./editarFichero.php?Fichero=".$_REQUEST["fichero"]);
                } else if(existe("leer")) {
                    if(file_exists($_REQUEST["fichero"])){

                    }else {
                        crearFichero();
                    }
                }
            }    
        }
    ?>
    <form action="./editaFichero" method="post" enctype="multipart/form-data">
        <p>
            <label for="idFichero">Nombre fichero: </label>    
            <input type="text" name="fichero" id="idFichero" placeholder="fichero" value=
            "<?php
                if(enviado() && !vacio("fichero")){
                    echo $_REQUEST["fichero"];
                }
            ?>"
            >
        </p>
        <input type="submit" value="editar" name="editar">
        <input type="submit" value="leer" name="leer">
    </form>

</body>
</html>