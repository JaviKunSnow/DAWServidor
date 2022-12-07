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
        <table border='1'>
            <tr>
                <th>id</th>
                <th>Jugador</th>
                <th>Edad</th>
                <th>PPP</th>
                <th>APP</th>
                <th>RPP</th>
                <th>Fecha debut</th>
                <th>Editar/Borrar</th>
            </tr>
        <?php
            try {
                $conexion = new mysqli();
                $conexion->connect($_SERVER["SERVER_ADDR"],"javier",PASS, BBDD);
                $sql = 'select * from LosAngelesLakers';
                $resultado = mysqli_query($conexion, $sql);
                while($filas = mysqli_fetch_assoc($resultado)){
                    echo "<tr>";
                    echo "<td>".$fila["jugador"]."</td>";
                    echo "<td>".$fila["edad"]."</td>";
                    echo "<td>".$fila["puntos"]."</td>";
                    echo "<td>".$fila["asistencias"]."</td>";
                    echo "<td>".$fila["rebotes"]."</td>";
                    echo "<td>".$fila["fechadebut"]."</td>";
                    echo "<td><a href='./editaBD.php?numero=".$fila["id"]."'>Editar/Borrar</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                $conexion->close();
            }catch(Exception $ex) {
                if($ex->getCode() == 1049){
                    echo "<span style='color: red;'>La base de datos no existe.</span>";
                    $conexion->close();
                    ?>
                        <input type="submit" name="enviar" value="crear BD">
                    <?
                }
                if($ex->getCode() == 1045){
                    echo "<span style='color: red;'>El nombre de usuario o la contraseña no es correcto.</span>";
                    $conexion0->close();
                }
                if($ex->getCode() == 2002){
                    echo "<span style='color: red;'>Se acabo el tiempo de espera, no hemos podido establecer la conexion.</span>";
                    $conexion0->close();
                }
            }
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