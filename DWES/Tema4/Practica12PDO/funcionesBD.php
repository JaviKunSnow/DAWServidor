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

// modificar BD

function eliminarDatos(){
    try {
        $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname='.BBDD, USER, PASS);

        $script = "delete from LosAngelesLakers where id='".$_REQUEST["numeroID"]."';";
        $consulta = $conexion->prepare($script);
        $consulta->execute();
    
    } catch (Exception $ex) {
        if ($ex->getCode()==1045){
            echo "Credenciales incorrectas";
        }
        if ($ex->getCode()==2002){
            echo "Acabado tiempo de conexión";
        }       
        if ($ex->getCode()==1049){
            echo "No existe la base de datos no existe";
        }       
    }  
}

function modificarDatos(){
    try {
        $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname='.BBDD, USER, PASS);

        $script = "update LosAngelesLakers set jugador='".$_REQUEST["jugador"]."', edad='".$_REQUEST["edad"]."', puntos='".$_REQUEST["puntos"]."', asistencias='".$_REQUEST["asistencias"]."', rebotes='".$_REQUEST["rebotes"]."', fechadebut='".$_REQUEST["fecha"]."' where id='".$_REQUEST["id"]."';";
    
        $consulta = $conexion->prepare($script);
        $consulta->execute();

    } catch (Exception $ex) {
        if ($ex->getCode()==1045){
            echo "Credenciales incorrectas";
        }
        if ($ex->getCode()==2002){
            echo "Acabado tiempo de conexión";
        }       
        if ($ex->getCode()==1049){
            echo "No existe la base de datos no existe";
        }       
    }
}

function insertarDatos() {

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
    $patron = '/^(\d{1,2}\.\d{1})$/';
    if(preg_match($patron, $_REQUEST[$stats]) == 1){
        return true;
    }
    return false;
}

function compFecha($fecha){
    $patron = '/^(\d{4})\-(0[1-9]|1[0-2])\-([0-2][0-9]|3[0-1])$/';
    
    if(preg_match($patron, $_REQUEST[$fecha])==1){
        return true;
    }
    return false;
}

function compLongitud($nombre){
    if(isset($_REQUEST[$nombre])){
        $i = $_REQUEST[$nombre];
        if(strlen($i) <= 60){
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