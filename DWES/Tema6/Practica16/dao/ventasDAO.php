<?php

class VentasDAO extends FactoryBD implements DAO {

public static function findAll() {
    $sql = "select * from ventas;";
    $datos = array();
    $devuelve = parent::ejecuta($sql,$datos);
    $arrayVentas = array();
    while($obj = $devuelve->fetchObject()){
        $venta = new Ventas($obj->id_venta, $obj->usuario, $obj->fechacomp, $obj->cod_producto, $obj->cantidad, $obj->precio_total);
        array_push($arrayVentas, $venta);
    }
    
    return $arrayVentas;
}

public static function findById($id) {
    $sql = "select * from ventas where id_venta = ?;";
    $datos = array($id);
    $devuelve = parent::ejecuta($sql,$datos);
    $obj = $devuelve->fetchObject();
    if($obj){
        $venta = new Ventas($obj->id_venta, $obj->usuario, $obj->fechacomp, $obj->cod_producto, $obj->cantidad, $obj->precio_total);
        return $venta;
    } else {
        return null;
    }
}

public static function insert($objeto) {
    $sql = "insert into ventas values (?, ?, ?, ?, ?, ?);";
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
    $sql = "update ventas set usuario = ?, fechacomp = ?, cod_producto = ?, cantidad = ?, precio_total = ? where id_venta = ?;";
    $datos = array($obj->usuario, $obj->fechacomp, $obj->cod_producto, $obj->cantidad, $obj->precio_total, $obj->id_venta);;
    $devuelve = parent::ejecuta($sql,$datos);
    if($devuelve->rowCount() == 0) {
        return false;
    } else {
        return true;
    }
}

public static function delete($id) {
    $sql = "delete from ventas where id_venta = ?;";
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