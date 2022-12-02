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

// consulta preparada - consultar
try {
    $conexion = mysqli_connect($_SERVER["SERVER_ADDR"],USER,PASS, 'mundial');
    $sql = 'select * from equipo where id = ? and nombre = ?';
    $consulta_preparada = mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($consulta_preparada, $sql);
    $id = 1;
    $nombre = "España";
    mysqli_stmt_bind_param($consulta_preparada,'is',$id, $nombre);
    mysqli_stmt_execute($consulta_preparada);
    mysqli_stmt_bind_result($consulta_preparada, $r_id, $r_nombre);
    while(mysqli_stmt_fetch($consulta_preparada)){
        echo "<br>id: ".$r_id.",nombre: ".$r_nombre;
    }
    mysqli_close($conexion);
} catch(Exception $ex){
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
}

// consulta preparada - insertar
try {
    $conexion = mysqli_connect($_SERVER["SERVER_ADDR"],USER,PASS, 'mundial');
    $sql = 'insert into equipo values (?,?)';
    $consulta_preparada = mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($consulta_preparada, $sql);
    $id = 4;
    $nombre = "Brazil";
    mysqli_stmt_bind_param($consulta_preparada,'is',$id, $nombre);
    mysqli_stmt_execute($consulta_preparada);
    echo mysqli_stmt_num_rows($consulta_preparada);
    mysqli_close($conexion);
} catch(Exception $ex){
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
}

// consulta preparada - actualizar
try {
    $conexion = mysqli_connect($_SERVER["SERVER_ADDR"],USER,PASS, 'mundial');
    $sql = 'update equipo set nombre = ? where nombre = \'Argentina\'';
    $consulta_preparada = mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($consulta_preparada, $sql);
    $nombre = "Japon";
    mysqli_stmt_bind_param($consulta_preparada,'s', $nombre);
    echo mysqli_stmt_num_rows($consulta_preparada);
    mysqli_stmt_execute($consulta_preparada);
    mysqli_close($conexion);
} catch(Exception $ex){
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
}

// transacciones

try {
    $conexion = mysqli_connect($_SERVER["SERVER_ADDR"],USER,PASS, 'mundial');
    mysqli_autocommit($conexion, false);
    $sql = "insert into equipo values (6,'Alemania');";
    $sql1 = "insert into equipo values (7,'Rusia');";
    $sql2 = "insert into equipo values (8,'Guayana');";
    mysqli_query($conexion, $sql);
    mysqli_query($conexion, $sql1);
    mysqli_query($conexion, $sql2);
    mysqli_commit($conexion);
} catch(Exception $ex){
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
    mysqli_rollback($conexion);
} finally {
    mysqli_close($conexion);
}

?>