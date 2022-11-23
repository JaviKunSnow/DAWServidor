<?php
    require("./funciones.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Practica 11</title>
    <link rel="stylesheet" href="../../../CSS/estilos.css">
</head>
<body>
    <?php
        include_once("../../../cabecera.html");
    ?>
    <?php
    $array = array("nombre", "nota1", "nota2", "nota3");
    $dom = new DOMDocument("1.0","utf-8");
    $dom->formatOutput = true;
    $raiz=$dom->createElement("notas");
    $dom->appendChild($raiz);
        if($fichero = fopen("notas.csv", "r")){
            while(($datos = fgetcsv($fichero, filesize("notas.csv"), ";")) !== false){
                $cont = count($datos);
                $alumno = $raiz->appendChild($dom->createElement("alumno"));
                for($i = 0; $i < $cont; $i++){
                    $alumno->appendChild($dom->createElement($array[$i], $datos[$i]));
                }
            }
            if($dom->save('notas.xml')){
                header('Location: ./leeFicheroXML.php');
                exit();
            } else {
                echo "<span style:'color: red;'>error, no se ha podido guardar el archivo</span>";
            }
            fclose($fichero);
        }
    ?>
</body>
</html>