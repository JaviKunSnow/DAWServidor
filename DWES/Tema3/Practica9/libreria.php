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

    function compNombre($nombre){
        $patron = '/\D{3,}/';
        if(preg_match($patron, $_REQUEST[$nombre]) == 1){
            return true;
        }
        return false;
    }

    function compApellidos($apellidos){
        $patron = '/\D{3,}\s\D{3,}/';
        if(preg_match($patron, $_REQUEST[$apellidos]) == 1){
            return true;
        }
        return false;
    }

    function compFecha($fecha){
        $patron = '/^[1-31]{1,2}(\/|-)[1-12]{1,2}(\/|-)[0-9]{1,4}$/';
        if(preg_match($patron, $_REQUEST[$fecha]) == 1){
            $valores = explode('/', $_REQUEST[$fecha]);
            if(checkdate($valores[1], $valores[0], $valores[2])){
                return true;
            } 
        }
        return false;
    }

    function compDNI($dni){

    }
?>