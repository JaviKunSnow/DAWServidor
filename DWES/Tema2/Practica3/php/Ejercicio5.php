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
    <div class="caja4">
    <?php
        $url = implode($_GET);
        echo "<h2>Contenido del Fichero: </h2>";
        if( $url == 1){
            highlight_file("Ejercicio1.php");
        }else if($url == 2){
            highlight_file("Ejercicio2.php");
        }else if($url == 3){
            highlight_file("Ejercicio3.php");
        }else if($url == 4){
            highlight_file("Ejercicio4.php");
        }
    ?>
    </div>
</body>
</html>