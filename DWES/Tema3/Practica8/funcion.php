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

    function comprobacion(){
        if (enviado()) {
           if (vacio("alnum") && is_numeric($_REQUEST["alnum"])) {                              
            return true;                 
           } else if (vacio("nombre")) {
            return true;
           } else if (vacio("fecha")) {
            return true;
           } else if (!existe("radio")) {
            return true;
           } else if (existe("opciones") && $_REQUEST["opciones"]==0) {
            return true;
           } else if (!existe("check") && veces("check")) {
            return true;
           } else if (vacio("telefono") && !is_numeric($_REQUEST["telefono"]) && !longitud("telefono")) {
            return true;
           } else if (vacio("mail")) {
            return true;
           } else if (vacio("pass")) {
            return true;
           }
        }
        return false; 
    }


    function mostrarResultados(){
       echo "<p>Nombre: ". $_REQUEST["nombre"] . "</p>";
       echo "<p>Nombre opcional: ". $_REQUEST["nombreo"] . "</p>";
       echo "<p>Alfanumerico: ". $_REQUEST["alnum"] . "</p>";
       echo "<p>Alfanumerico opcional: ". $_REQUEST["alnumop"] . "</p>";
       echo "<p>Fecha: ". $_REQUEST["fecha"] . "</p>";
       echo "<p>Fecha opcional: ". $_REQUEST["fechao"] . "</p>";
       echo "<p>opciones radio: ". $_REQUEST["radio"] . "</p>";
       echo "<p>opciones desplegable: ". $_REQUEST["opciones"] . "</p>";
       echo "<p>telefono: ". $_REQUEST["telefono"] . "</p>";
       echo "<p>mail: ". $_REQUEST["mail"] . "</p>";
       echo "<p>contraseña: ". $_REQUEST["pass"] . "</p>";
    }
?>