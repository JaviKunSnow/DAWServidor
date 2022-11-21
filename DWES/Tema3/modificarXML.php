<?php

// leer el documento
$dom = new DOMDocument();
$dom->load("mundial.xml");
// buscar la etiqueta nombre que tenga de valor Francia
foreach($dom->childNodes as $elementos){
    foreach($elementos->childNodes as $datos){
        if($datos->nodeValue == "Baguette"){
            $datos->nodeValue = "Zidane";
        }
    }
}

// cambiar el value

if($dom->save('mundial.xml')){
    echo "todo correcto";
} else {
    echo "error";
}

// salvar el documento
?>