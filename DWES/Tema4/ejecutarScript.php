<?php

require("./conexion.php");
// Conexion y consulta de tablas
try {
    $conexion = mysqli_connect($_SERVER["SERVER_ADDR"],USER,PASS);
    $script = file_get_contents("./examendwes.sql");
    mysqli_multi_query($conexion, $script);
    mysqli_close($conexion);
} catch(Exception $ex){
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
}

?>