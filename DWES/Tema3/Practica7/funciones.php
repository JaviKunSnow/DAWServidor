<?php

function br(){
    echo "<br>";
}

function h1($h1){
    echo "<h1>". $h1 . "</h1>";
}

function p($p){
    echo "<p>". $p . "</p>";
}

function myself(){
    echo basename(__FILE__);
}

function dni($dni){
    $letra = substr($dni, -1);
    echo $letra;
}


?>