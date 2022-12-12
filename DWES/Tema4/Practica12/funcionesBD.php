<?

function enviado(){
    if(isset($_REQUEST["enviar"])){
        return true;
    }
    return false;
}

function enviadoGuardar(){
    if(isset($_REQUEST["guardar"])){
        return true;
    }
    return false;
}

function crearBD(){ 
    return file_get_contents("sql/nba.sql");
}

// expresiones regulares

function vacio($nombre){
    if(empty($_REQUEST[$nombre])){
        return true;
    }
    return false;
}

function compEdad($edad){
    $patron = '/^(\d{2})$/';
    if(preg_match($patron, $_REQUEST[$edad]) == 1){
        return true;
    }
    return false;
}

function compStats($stats){
    $patron = '/^(\d{2}\.\d{1})$/';
    if(preg_match($patron, $_REQUEST[$stats]) == 1){
        return true;
    }
    return false;
}

function compFecha($fecha){
    $patron = '/^(\d{4})\-(0[1-9]|1[0-2])\-([0-2][0-9]|3[0-1])$/';
    
    if(preg_match($patron, $_REQUEST[$fecha])==1){
        
        $valores = explode('-', $_REQUEST[$fecha]);
        
        if(checkdate($valores[1], $valores[0], $valores[2])){
            return true;
        } 
        
    }
    return false;
}

function compLongitud($nombre){
    if(isset($_REQUEST[$nombre])){
        $i = $_REQUEST[$nombre];
        if(strlen($i) >= 60){
            return true;
        }
    }
    return false;
}

function compTodo() {
    if(!vacio("jugador") && compLongitud("jugador")){
        if(!vacio("edad") && compEdad("edad")){
            if(!vacio("puntos") && compStats("puntos")){
                if(!vacio("asistencias") && compStats("asistencias")){
                    if(!vacio("rebotes") && compStats("rebotes")){
                        if(!vacio("fecha") && compFecha("fecha")){
                            return true;
                        }
                    }
                }
            }
        }
    }
    return false;
}

?>