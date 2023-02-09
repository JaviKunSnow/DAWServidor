<?php

function estaValidado() {
    if(isset($_SESSION["validado"])){
        return true;
    }
    return false;
}

function esAdmin() {
    if(isset($_SESSION["perfil"])){
        if($_SESSION["perfil"] == "admin") {
            return true;
        }
    }
    return false;
}

?>