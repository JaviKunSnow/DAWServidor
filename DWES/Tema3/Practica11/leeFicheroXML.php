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
            $dom = new DOMDocument();
            $dom ->load('notas.xml');
            $raiz = $dom->childNodes[0];
            $j = 0;
            foreach($raiz->childNodes as $elementos){
                if($elementos->nodeType == 1){
                    echo "<tr>";
                    foreach($elementos->childNodes as $datos){
                        if($datos->nodeType == 1){
                            echo "<td>".$datos->nodeValue."</td>";
                        }
                    }
                    echo "<td><a href='./editaFicheroXML.php?numero=".$j++."'>Editar</a></td>";
                    echo "</tr>";
                }
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