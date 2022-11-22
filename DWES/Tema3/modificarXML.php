<?php

// leer el documento
$dom = new DOMDocument();
$dom->load("mundial.xml");
// buscar la etiqueta nombre que tenga de valor Francia
/*
foreach($dom->childNodes as $elementos){
    if($elementos->nodeType == 1){
        foreach($elementos->childNodes as $datos){
            if($datos->nodeType == 1){
                foreach($datos->childNodes as $mas){
                    if($mas->nodeName == "Entrenador"){
                        $datos->replaceChild($nuevo,$mas);
                    }
                }
            }
        }
    }
}
*/
// cambiar el value
/*
if($dom->save('mundial.xml')){
    echo "todo correcto";
} else {
    echo "error";
}
*/
// salvar el documento


// con el getElement

$nombres = $dom->getElementsByTagName("Nombre");
foreach($nombres as $nombre){
    if($nombre->nodeValue == 'Francia'){
        $nombre->nextElementSibling->nodeValue = "Paco";
    }
}

if($dom->save('mundial.xml')){
    echo "todo correcto";
}

?>