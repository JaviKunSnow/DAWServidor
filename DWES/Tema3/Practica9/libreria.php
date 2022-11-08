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

    function compFecha(){
        $patron = '/^([0-2][0-9]|3[0-1])\/[1-12]{1,2}\/\d{4}$/';
        $fechaactual = new dateTime();
        if(preg_match($patron, $_REQUEST["fecha"]) == 1){
            $valores = explode('/', $_REQUEST["fecha"]);
            if(checkdate($valores[1], $valores[0], $valores[2])){
                $fecha = new dateTime($_REQUEST["fecha"]);
                $intervalo = $fechaactual->diff($fecha);
                if($intervalo->y >= 18){
                    return true;
                }
            } 
            
        }
        return false;
    }

    function compDNI($dni){
        $patron= '/\d{8}[T|R|W|A|G|M|Y|F|P|D|X|B|N|J|Z|S|Q|V|H|L|C|K|E]$/';
        if (preg_match($patron,$_REQUEST['dni'])==1){
            $letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
            $num= substr($_REQUEST['dni'],0,8);
            $dni=$_REQUEST['dni'];
            if ($dni[8] == $letras[$num%23]){
                    return true;
            }
        }
        return false;
    }


?>