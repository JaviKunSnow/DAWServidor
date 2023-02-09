<?php

function get() {
    $ch = curl_init();
    $url = "http://192.168.2.200/corregir/api/miapi.php/sorteo?min=1&max=50";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultado = curl_exec($ch);

    curl_close($ch);
    return $resultado;

}

?>