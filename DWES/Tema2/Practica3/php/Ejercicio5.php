<?php
    $url = implode($_GET);
    echo "<h2>Codigo del Fichero: </h2>";
    if( $url == 1){
        highlight_file("Ejercicio1.php");
    }else if($url == 2){
        highlight_file("Ejercicio2.php");
    }else if($url == 3){
        highlight_file("Ejercicio3.php");
    }else if($url == 4){
        highlight_file("Ejercicio4.php");
    }
?>