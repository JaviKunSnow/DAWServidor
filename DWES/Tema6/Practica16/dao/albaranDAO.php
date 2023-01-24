<?php

class AlbaranDAO extends FactoryBD implements DAO {

public static function findAll() {
    $sql = "select * from albaran;";
    $datos = array();
    $devuelve = parent::ejecuta($sql,$datos);
    $arrayAlbaran = array();
    while($obj = $devuelve->fetchObject()){
        $albaran = new Albaran($obj->id_albaran, $obj->fechaalb, $obj->cod_producto, $obj->cantidad, $obj->usuario);
        array_push($arrayAlbaran, $albaran);
    }
    
    return $arrayAlbaran;
}

public static function findById($id) {
    $sql = "select * from albaran where id_albaran = ?;";
    $datos = array($id);
    $devuelve = parent::ejecuta($sql,$datos);
    $obj = $devuelve->fetchObject();
    if($obj){
        $albaran = new Albaran($obj->id_albaran, $obj->fechaalb, $obj->cod_producto, $obj->cantidad, $obj->usuario);
        return $albaran;
    } else {
        return null;
    }
}

public static function insert($objeto) {
    $sql = "insert into albaran values (?, ?, ?, ?);";
    $objeto = (array)$objeto;
    $datos = array();
    foreach($objeto as $obj){
        array_push($datos, $obj);
    }
    $devuelve = parent::ejecuta($sql,$datos);
    if($devuelve->rowCount() == 0) {
        return false;
    } else {
        return true;
    }
}

public static function update($obj) {
    $sql = "update albaran set fechaalb = ?, cod_producto = ?, cantidad = ?, usuario = ?  where id_albaran = ?;";
    $datos = array($obj->fechaalb, $obj->cod_producto, $obj->cantidad, $obj->usuario, $obj->id_albaran);
    $devuelve = parent::ejecuta($sql,$datos);
    if($devuelve->rowCount() == 0) {
        return false;
    } else {
        return true;
    }
}

public static function delete($id) {
    $sql = "delete from albaran where id_albaran = ?;";
    $datos = array($id);
    $devuelve = parent::ejecuta($sql,$datos);
    if($devuelve->rowCount() == 0) {
        return false;
    } else {
        return true;
    }
}

}

?>