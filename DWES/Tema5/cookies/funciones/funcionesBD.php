<?php

function findAll(){
    try {
        $conexion = new PDO("mysql:host=".$_SERVER["SERVER_ADDR"].";dbname=".BBDD, USER, PASS);
        $sql = "select * from producto";
        $devuelve = $conexion->query($sql);
        $devuelve2 = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        unset($conexion);
        return $devuelve2;

    } catch (Exception $ex) {
        print_r($ex);
        unset($conexion);
        return false;
    }
}

function findById($id){
    try {
        $conexion = new PDO("mysql:host=".$_SERVER["SERVER_ADDR"].";dbname=".BBDD, USER, PASS);
        $sql = "select * from producto where codigo= ?";
        $preparada = $conexion->prepare($sql);
        $devuelve = $preparada->execute(array($id));
        if($devuelve) {
            unset($conexion);
            $devuelve->fecthAll();
            
        } else {
            return false;
        }

    } catch (Exception $ex) {
        print_r($ex);
        unset($conexion);
        return false;
    }
}

?>