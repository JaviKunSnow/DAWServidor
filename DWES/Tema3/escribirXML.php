<?php

$dom = new DOMDocument("1.0","utf-8");
// para que este bonito

$dom->formatOutput = true;
$raiz = $dom->createElement("mundial");
$dom->appendChild($raiz);

// elementos equipo

$equipo = $raiz->appendChild($dom->createElement("equipo"));
$equipo->appendChild($dom->createElement("equipo", "España"));
$equipo->appendChild($dom->createElement("Entrenador", "Luis Enrique"));
$equipo = $raiz->appendChild($dom->createElement("equipo"));
$equipo->appendChild($dom->createElement("equipo", "Francia"));
$equipo->appendChild($dom->createElement("Entrenador", "Baguette"));


// guardamos el dom en un documento
if($dom->save('mundial.xml')){
    echo "todo correcto";
} else {
    echo "error";
}

?>