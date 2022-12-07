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
    <form action="./leeBD.php" method="post">
        <?php
            $conexion = new mysqli();
            $conexion->connect($_SERVER["SERVER_ADDR"],USER,PASS, BBDD);
            echo "<table border='1'>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Jugador</th>";
                echo "<th>Edad</th>";
                echo "<th>PPP</th>";
                echo "<th>APP</th>";
                echo "<th>RPP</th>";
                echo "<th>Fecha debut</th>";
                echo "<th>Modificar</th>";
                echo "<th>Borrar</th>";
            echo "</tr>";
            $sql = 'select * from LosAngelesLakers';
            $resultado = mysqli_query($conexion, $sql);
            $i = 0;
            while($filas = mysqli_fetch_assoc($resultado)){
                echo "<tr>";
                echo "<td>".$fila["id"]."</td>";
                echo "<td>".$fila["jugador"]."</td>";
                echo "<td>".$fila["edad"]."</td>";
                echo "<td>".$fila["puntos"]."</td>";
                echo "<td>".$fila["asistencias"]."</td>";
                echo "<td>".$fila["rebotes"]."</td>";
                echo "<td>".$fila["fechadebut"]."</td>";
                echo "<td><a href='./editaBD.php?numero=".$i++."'>Editar</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
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