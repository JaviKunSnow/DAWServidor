<?php


class ProductoDAO extends FactoryBD implements DAO {

public static function findAll() {
    $sql = "select * from producto;";
    $datos = array();
    $devuelve = parent::ejecuta($sql,$datos);
    $arrayProductos = array();
    while($obj = $devuelve->fetchObject()){
        $producto = new Producto($obj->cod_producto, $obj->nombre, $obj->descripcion, $obj->foto, $obj->precio, $obj->stock);
        array_push($arrayProductos, $producto);
    }
    
    return $arrayProductos;
}

public static function findById($id) {
    $sql = "select * from producto where cod_producto = ?;";
    $datos = array($id);
    $devuelve = parent::ejecuta($sql,$datos);
    $obj = $devuelve->fetchObject();
    if($obj){
        $producto = new Producto($obj->cod_producto, $obj->nombre, $obj->descripcion, $obj->foto, $obj->precio, $obj->stock);
        return $producto;
    } else {
        return null;
    }
}

public static function insert($objeto) {
    $sql = "insert into producto values (?, ?, ?, ?, ?);";
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
    $sql = "update producto set nombre = ?, descripcion = ?, foto = ?, precio = ?, stock = ?  where cod_producto = ?;";
    $datos = array($obj->nombre, $obj->descripcion, $obj->foto, $obj->precio, $obj->stock, $obj->cod_producto);
    $devuelve = parent::ejecuta($sql,$datos);
    if($devuelve->rowCount() == 0) {
        return false;
    } else {
        return true;
    }
}

public static function delete($id) {
    $sql = "delete from producto where cod_producto = ?;";
    $datos = array($id);
    $devuelve = parent::ejecuta($sql,$datos);
    if($devuelve->rowCount() == 0) {
        return false;
    } else {
        return true;
    }
}

public static function buy($id, $stock) {
    $sql = "update producto set stock = ? where cod_producto = ?;";
    $datos = array($stock, $id);
    $devuelve = parent::ejecuta($sql,$datos);
    if($devuelve->rowCount() == 0) {
        return false;
    } else {
        return true;
    }
}

}