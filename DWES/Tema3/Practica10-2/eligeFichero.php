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
    <form action="./eligeFichero.php" method="post">
        <?php
            echo "<table border='1'>";
            echo "<tr>";
                echo "<th>Alumno</th>";
                echo "<th>Nota 1</th>";
                echo "<th>Nota 2</th>";
                echo "<th>Nota 3</th>";
                echo "<th>Editar</th>";
            echo "</tr>";
            if($fichero = fopen("notas.csv", "r")){
                $array = array();
                $j = 0;
                while(($datos = fgetcsv($fichero, filesize("notas.csv"), ";")) !== false){
                    $cont = count($datos);
                    echo "<tr>";
                    array_push($array, $datos); 
                    for($i = 0; $i<$cont;$i++){
                        echo "<td>".$datos[$i]."</td>";
                    }
                    echo "<td><a href='./editaFichero.php?numero=".$j++."'>Editar</a></td>";
                    echo "</tr>";
                }
                fclose($fichero);
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