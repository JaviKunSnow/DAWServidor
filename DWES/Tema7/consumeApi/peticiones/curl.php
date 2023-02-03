<?php

function get() {
    $ch = curl_init();
    $url = "http://192.168.2.205/ServidorClase/Tema7/api/conciertos.php/conciertos";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultado = curl_exec($ch);

    curl_close($ch);
    return json_decode($resultado);

}

function post($grupo, $fecha, $precio, $lugar) { 
    $json = "{
        grupo: ".$grupo.",
        fecha: ".$fecha.",
        precio: ".$precio.",
        lugar: ".$lugar."
    }";


    $ch = curl_init();
    $url = "http://192.168.2.205/ServidorClase/Tema7/api/conciertos.php/conciertos";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, 'Content-Type: application/json');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_exec($ch);
    curl_close($ch);
    

}

?>