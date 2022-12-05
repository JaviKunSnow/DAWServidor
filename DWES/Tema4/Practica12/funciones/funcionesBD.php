<?

require("./conexion.php");

function enviado($enviar){
    if(isset($_REQUEST[$enviar])){
        return true;
    }
    return false;
}

function crearBD(){
    try {
        $conexion = mysqli_connect($_SERVER["SERVER_ADDR"],USER,PASS);
        $script = file_get_contents("../sql/nba.sql");
        mysqli_multi_query($conexion, $script);
        $conexion->close();
    } catch(Exception $ex){
        echo mysqli_connect_errno();
        echo mysqli_connect_error();
    }
}

?>