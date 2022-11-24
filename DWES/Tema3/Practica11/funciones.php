<?php

function enviado(){
    if(isset($_REQUEST['cambiar'])){
        return true;
    }
    return false;
}

function vacio($nombre){
    if(empty($_REQUEST[$nombre]) && $_REQUEST[$nombre] != 0){
        return true;
    }
    return false;
}

function existe($nombre){
    if(isset($_REQUEST[$nombre])){
       return true;
    }
    return false;
}

function compNotas($nota){
    $patron= '/^(10|\d)$/';
    if (preg_match($patron,$_REQUEST[$nota]) == 1){
        return true;
    }
    return false;
}

function compTodo(){
    if (enviado()){
        if (!vacio("nota1") && compNotas("nota1")){
            if(!vacio("nota2") && compNotas("nota2")){
                if(!vacio("nota3") && compNotas("nota3")){
                    return true;
                }
            }
        }
    }
    return false;
}

?>