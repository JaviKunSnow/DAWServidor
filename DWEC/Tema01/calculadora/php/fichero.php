<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../../CSS/estilos.css">
    <title>Ejercicio 5</title>
</head>
<body>
    <?php
        include_once "../../../../cabecera.html";
    ?>
    <div class="caja5">
    <?php
        $url = implode($_GET);
        echo "<h2>Contenido del Fichero: </h2>";
        if( $url == 1){
            highlight_file("../js/variables.js");
        }
    ?>
    </div>
</body>
</html>