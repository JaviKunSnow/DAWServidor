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
    return file_get_contents("../sql/nba.sql");
}

?>