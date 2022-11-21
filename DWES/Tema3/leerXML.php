<?php

$dom = new DOMDocument();
$dom ->load('departamento.xml');

echo "fichero<br>";
// leer el raiz

$raiz = $dom->childNodes[0];
echo "Raiz: ". $raiz->nodeName;
echo "<br>";
// hijos de la raiz
echo "tiene " . $raiz->childNodes->length . " hijos";
echo "<br>";
// recorrer los hijos

foreach($raiz->childNodes as $elementos){
    if($elementos->nodeType == 1){
        echo "elemento: ". $elementos->nodeName . "<br>";
    }
    foreach($elementos->childNodes as $datos){
        if($datos->nodeType == 1){
            echo "hijo: ". $datos->nodeName . " y valor: ". $datos->nodeValue . "<br>";
        }
    }
}

// escribir en fichero xml


?>