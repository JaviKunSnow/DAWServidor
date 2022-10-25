<?php
function vacio($nombre){
        if(empty($_REQUEST[$nombre])){
            return true;
        }
        return false;
    }

    function enviado(){
        if(isset($_REQUEST["enviar"])){
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

    function veces($nombre){
        if(count($_REQUEST[$nombre]) > 3){
            return true;
        }
        return false;
    }

    function longitud($nombre){
        $i = $_REQUEST[$nombre];
        if(strlen($i) == 9){
            return true;
        }
        return false;
    }
?>