<?php

require("./conexion.php");
// Conexion y consulta de tablas
try {
    $conexion = mysqli_connect($_SERVER["SERVER_ADDR"],USER,PASS, 'mundial');
    $sql = 'select * from equipo';
    $resultado = mysqli_query($conexion, $sql);
    echo "<br>";
    print_r($resultado->fetch_array());
    echo "<br>";

    while($filas = mysqli_fetch_array($resultado, MYSQLI_NUM)){
        echo "numero: ".$filas[0]." pais: ".$filas[1]."<br>";

    }

    mysqli_close($conexion);
} catch(Exception $ex){
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
}

try {
    $conexion0 = new mysqli();
    $conexion0->connect($_SERVER["SERVER_ADDR"],USER,PASS, 'mundial');
    $conexion0->close();
} catch(Exception $ex){
    if($ex->getCode() == 1045){
        echo "El nombre de usuario o la contraseña no es correcto.";
    }
    if($ex->getCode() == 2002){
        echo "Se acabo el tiempo de espera, no hemos podido establecer la conexion.";
    }
    if($ex->getCode() == 1049){
        echo "La base de datos no existe.";
    }
}

//
try {
    $conexion = mysqli_connect($_SERVER["SERVER_ADDR"],USER,PASS, 'mundial');
    $sql = 'select * from equipo where id = ? and nombre = ?';
    $consulta_preparada = mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($consulta_preparada, $sql);
    $id = 1;
    $nombre = "España";
    mysqli_stmt_bind_param($consulta_preparada,'i',$id);
    mysqli_stmt_bind_param($consulta_preparada,'s',$nombre);
    mysqli_stmt_execute($consulta_preparada);
    mysqli_close($conexion);
} catch(Exception $ex){
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
}

?>