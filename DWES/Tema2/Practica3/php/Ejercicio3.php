<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../../CSS/estilos.css">
    <title>Ejercicio 3</title>
</head>
<body>
    <?php
        include_once "../../../../cabecera.html";
    ?>
    <?php
       $valor1 = $_GET['dia'];
       $valor2 = $_GET['mes'];
       $valor3 = $_GET['ano'];
       $fecha = $valor1.'/'.$valor2.'/'.$valor3;
       echo "<h2>FECHA PASADA POR URL:</h2>";
       echo "<br>";
       echo "<p>$fecha</p>";
       echo "<br>";
       echo "<h2>Dia de la semana:</h2>";
       $fecha = new dateTime($fecha);
       echo date_format($fecha, "l");
    ?>
    <h2>LINK EJERCICIO 5:</h2>
    <div class="cajalink2">
        <a href="Ejercicio5.php?valor=3"><p>Ejercicio 5</p></a>
    </div>
</body>
</html>