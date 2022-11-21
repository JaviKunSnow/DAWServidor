<?php

// leer el documento
$dom = new DOMDocument();
$dom->load("mundial.xml");
// buscar la etiqueta nombre que tenga de valor Francia
foreach($dom->childNodes as $elementos){
    foreach($elementos->childNodes as $datos){
        if($datos->tagName == "Baguette"){
            $datos->nodeValue = "Zidane";
        }
    }
}

if($dom->save('mundial.xml')){
    echo "todo correcto";
} else {
    echo "error";
}
// cambiar el value

// salvar el documento
?>