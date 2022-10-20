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
  $numberos = substr($dni, 0, -1);

  if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numberos%23, 1) == $letra && strlen($letra) == 1 && strlen ($numberos) == 8 ){
    echo "Es valido";
  }
    echo "No es valido";
}


?>