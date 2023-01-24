<?php

function estaValidado() {
    if(isset($_SESSION["validado"])){
        return true;
    }
    return false;
}

function esAdmin() {
    if(isset($_SESSION["perfil"])){
        if($_SESSION["perfil"] == "ADM") {
            return true;
        }
    }
    return false;
}

function esModerador() {
    if(isset($_SESSION["perfil"])){
        if($_SESSION["perfil"] == "MOD") {
            return true;
        }
    }
    return false;
}

?>