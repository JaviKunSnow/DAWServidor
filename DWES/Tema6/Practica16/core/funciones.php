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

function existe($nombre){
    if (isset($_REQUEST[$nombre]))
        return true;
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

function vacio($nombre){
    if(empty($_REQUEST[$nombre])){
        return true;
    }
    return false;
}

function enviadoRegistro(){
    if(isset($_REQUEST["registrar"])){
        return true;
    }
    return false;
}

function compPass($pass){
    $patron = '/^.{8}[A-Z]{1}[a-z]{1}[0-9]{1}$/';
    if(preg_match($patron, $_REQUEST[$pass]) == 1){
        return true;
    }
    return false;
}

function compMail($mail){
    $patron = '/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/';
    if(preg_match($patron, $_REQUEST[$mail]) == 1){
        return true;
    }
    return false;
}

function compFecha($fecha){
    $patron = '/^(\d{4})\-(0[1-9]|1[0-2])\-([0-2][0-9]|3[0-1])$/';
    
    if(preg_match($patron, $_REQUEST[$fecha]) == 1){
        return true;
    }
    return false;
}

function subirImagen(){
    $ruta = '/webroot/img/'. $_FILES['fichero']['name'];
    move_uploaded_file($_FILES['fichero']['tmp_name'], $ruta);
}

function compTodo() {
    if(enviadoRegistro()) {
        if(!vacio("user")){
            if(!vacio("nombre")){
                if(!vacio("pass") && compPass("pass")){
                    if(!vacio("mail") && compMail("mail")){
                        if(!vacio("fecha") && compFecha("fecha")){
                            if(existe("rol") && $_REQUEST["rol"] != 0){
                                return true;
                            }
                        }
                    }
                }
            }
        }
    }
    return false;
}

?>