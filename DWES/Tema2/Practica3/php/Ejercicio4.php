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
       $valor4 = $_GET['primero'];
       $valor5 = $_GET['segundo'];
       $valor6 = $_GET['tercero'];
       $fecha = $valor1.'/'.$valor2.'/'.$valor3;
       $fecha2 = $valor4.'/'.$valor5.'/'.$valor6;
       echo "<h2>FECHA DE NACIMIENTO DE LAS 2 PERSONAS:</h2>";
       echo "<p>Persona 1: $fecha</p>";
       echo "<p>Persona 2: $fecha2</p>";
       echo "<h2>Diferencia de Edad entre ellos:</h2>";
       $fecha = new dateTime($fecha);
       $fecha2 = new dateTime($fecha2);
       $diff = $fecha->diff($fecha2);
       echo $diff->y . " Años "; 
    ?>
    <h2>LINK EJERCICIO 5:</h2>
    <div class="cajalink2">
        <a href="Ejercicio5.php?valor=3"><p>Ejercicio 5</p></a>
    </div>
</body>
</html>