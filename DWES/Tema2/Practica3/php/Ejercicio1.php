<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../../CSS/estilos.css">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
        include_once "../../../../cabecera.html";
    ?>
    <?php
        echo "<h1>EJERCICIO 1</h1>";
        echo "<h2>A.El nombre de fichero actual es: </h2>". basename(__FILE__);
        echo "<br>";
        echo "<h2>B.La direccion IP del equipo actual: </h2>";
        echo "$_SERVER[REMOTE_ADDR]";
        echo "<br>";
        echo "<h2>C. La ruta del fichero actual es: </h2>" . __FILE__;
        echo "<br>";
        echo "<h2>D. La fecha actual modificada es: </h2>"; 
        echo date("Y-m-d h:m:s");
        echo "<h2>E. Hora y fecha de Oporto: </h2>";
        date_default_timezone_set('Europe/Lisbon');
        echo date("d-m-Y h:m:s", strtotime("now")). date_default_timezone_get();
        echo "<br>";
        echo "<h2>F. Fecha de mi cumpleaños usando timestamp: </h2>";
        $fecha = new DateTime("06/03/1999");
        echo "Fecha en timestamp: " . date_timestamp_get($fecha) . " y en normal: ";
        echo date_format($fecha, "d/m/Y");
        echo "<br>";
        echo "<h2>G. Fecha y dia de la semana en 60 dias: </h2>";
        $fechahoy = date("d-m-Y");
        echo date("d-m-Y", strtotime($fechahoy. "+ 60 days"));
    ?>
    <h2>LINK EJERCICIO 5:</h2>
    <div class="cajalink2">
        <a href="Ejercicio5.php?valor=1"><p>Ejercicio 5</p></a>
    </div>
</body>
</html>