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
        $patron = '/^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})/';
        $fechaactual = new dateTime();
        if(preg_match($patron, $_REQUEST[$fecha])){
            $valores = explode('/', $_REQUEST[$fecha]);
            $fecha1 = new dateTime($_REQUEST[$fecha]);
            $intervalo = $fechaactual->diff($fecha);
            $year = $intervalo->y;
            if($year >= 18){
                if(checkdate($valores[1], $valores[0], $valores[2])){
                    return true;
                } 
            }
            
        }
        return false;
    }

    function compDNI($dni){

    }
?>