<?php

require("./conexion.php");

// conexion
/*
try {
    
    $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD, USER, PASS);

    // echo $conexion->getAttribute(PDO::ATTR_CLIENT_VERSION);
    
    echo "conexion correcta";
    $sql = "select * from equipo";
    $resultado = $conexion->query($sql);
    echo "<br>Numero Equipos: ".$resultado->rowCount()."<br>";
    while($fila = $resultado->fetch(PDO::FETCH_BOTH)){
        //echo "numero: ".$fila[0]." equipo: ".$fila[1]."<br>"; 
        echo "<pre>";
        print_r($fila);
        echo "</pre>";
    }
} catch (Exception $ex) {
    echo "error";
    print_r($ex);
} finally {
    unset($conexion);
}

// insertar datos
try {
    
    $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD, USER, PASS);

    // echo $conexion->getAttribute(PDO::ATTR_CLIENT_VERSION);

    echo "conexion correcta";
    $sql = "insert into equipo values('10','Zimbabue')";
    $conexion->exec($sql);
    $sql2 = "select * from equipo";
    $resultado = $conexion->query($sql2);
    echo "<br>Numero Equipos: ".$resultado->rowCount()."<br>";
    while($fila = $resultado->fetch(PDO::FETCH_BOTH)){
        //echo "numero: ".$fila[0]." equipo: ".$fila[1]."<br>"; 
        echo "<pre>";
        print_r($fila);
        echo "</pre>";
    }
} catch (Exception $ex) {
    echo "error";
    print_r($ex);
} finally {
    unset($conexion);
}

//consulta preparada
try {
    
    $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD, USER, PASS);

    // echo $conexion->getAttribute(PDO::ATTR_CLIENT_VERSION);

    echo "conexion correcta";
    $sql = $conexion->prepare("insert into equipo values(?,?)");
    $sql->bindParam(1, 11);
    $sql->bindParam(2, "Marruecos");
    $sql->execute();
    $sql2 = "select * from equipo";
    $resultado = $conexion->query($sql2);
    echo "<br>Numero Equipos: ".$resultado->rowCount()."<br>";
    while($fila = $resultado->fetch(PDO::FETCH_BOTH)){
        //echo "numero: ".$fila[0]." equipo: ".$fila[1]."<br>"; 
        echo "<pre>";
        print_r($fila);
        echo "</pre>";
    }
} catch (Exception $ex) {
    echo "error";
    print_r($ex);
} finally {
    unset($conexion);
}

// conexion con array
try {
    
    $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD, USER, PASS);

    // echo $conexion->getAttribute(PDO::ATTR_CLIENT_VERSION);

    echo "conexion correcta";
    $sql = $conexion->prepare("insert into equipo values(?,?)");
    $array = array(12, "China");
    $sql->execute($array);

} catch (Exception $ex) {
    echo "error";
    print_r($ex);
} finally {
    unset($conexion);
}

// conexion con array asociativo
try {
    
    $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD, USER, PASS);

    // echo $conexion->getAttribute(PDO::ATTR_CLIENT_VERSION);

    echo "conexion correcta";
    $sql = $conexion->prepare("insert into equipo values(:id,:nombre)");
    $array = array(
        ":id" => 13, 
        ":nombre" => "Paraguay");
    $sql->execute($array);

} catch (Exception $ex) {
    echo "error";
    print_r($ex);
} finally {
    unset($conexion);
}*/

try {
    
    $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD, USER, PASS);

    // echo $conexion->getAttribute(PDO::ATTR_CLIENT_VERSION);

    echo "conexion correcta";
    $sql = $conexion->prepare("select * from equipo where nombre like :nombre");
    $array = array( 
        ":nombre" => "%na%");
    $sql->execute($array);

    //insertar en variables
    $sql->bindColumn(1, $id);
    $sql->bindColumn(2, $nombre);
    while($row = $sql->fetch(PDO::FETCH_BOUND)){
        echo "<br> ".$id.":".$nombre;
    }

} catch (Exception $ex) {
    echo "error";
    print_r($ex);
} finally {
    unset($conexion);
}

?>