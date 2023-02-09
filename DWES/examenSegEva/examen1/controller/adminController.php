<?php

$lista = ApuestaDAO::findAll();

if(!isset($_SESSION["sorteo"])) {
    $_SESSION["sorteo"] = false;
} else {
    if(isset($_REQUEST["generar"])) {
        
    }
}

?>