<?php
   function vacio($nombre){
        if(empty($_REQUEST[$nombre])){
            return true;
        }
        return false;
    }

    function enviado(){
        if(isset($_REQUEST["Enviado"])){
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
        $patron = '/[A-Z]{1,1}[a-z]{2,}\s[A-Z]{1,1}[a-z]{2,}\s[A-Z]{1,1}[a-z]{2,}/';
        if(preg_match($patron, $_REQUEST[$nombre]) == 1){
            return true;
        }
        return false;
    }

    function compExpediente($exp){
        $patron = '/\d{2}[A-Z]{3}\/\d{2}/';
        if(preg_match($patron, $_REQUEST[$exp]) == 1){
            return true;
        }
        return false;
    }

    function compPrimera(){
        if(enviado()){
            if(!vacio("nombre") && compNombre("nombre")){
                if(!vacio("exp") && compExpediente("exp")){
                    if(existe("curso1") && $_REQUEST["curso1"] != "no"){
                        return true;
                    }
                }
            }
        }
        return false;
    }

    function compTotal(){
        if(enviado()){
            if(!vacio("nombre") && compNombre("nombre")){
                if(!vacio("exp") && compExpediente("exp")){
                    return true;
                }
            }
        }
        return false;
    }

?>