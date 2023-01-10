<?php

function productoVisto($id) {
    // si no existe ninguna cookie, creamos [0]
    if(!isset($_COOKIE['visto'])){
        setcookie('visto[0]', $id);
    } else {
        $array = $_COOKIE['visto'];
        // array maximo de 3
        // si existe en el array
        if(in_array($id, $array)) {
            $key = array_search($id, $array);
            unset($array[$key]);
            array_push($array, $id);
        } else {
            if(count($array) == 3){
                unset($array[0]);
            }
            array_push($array, $id);
        }
        actualizar($array);
    }
}

function actualizar($array) {
    $cont = 0; 
    foreach($array as $id) {
        setcookie('visto['.$cont.']', $id);
        $cont++;
    }
}

function mostrarUltimos() {
    if(isset($_COOKIE['visto'])){
        $array = $_COOKIE['visto'];
        $array = array_reverse($array);
        foreach($array as $id) {
            $producto = findById($id);
            $producto = $producto[0];
            echo "<article class='card'>";
                echo "<img src='webroot/".$producto['baja']."'<(img>";
                echo "<p>".$producto['nombre']."</p>";
            echo "</article>";
        }
    }
}

?>