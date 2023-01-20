<?php


class ProductoDAO extends FactoryBD implements DAO {

public static function findAll() {
    $sql = "select * from producto;";
    $datos = array();
    $devuelve = parent::ejecuta($sql,$datos);
    $arrayProductos = array();
    while($obj = $devuelve->fetchObject()){
        $producto = new Producto($obj->codProd, $obj->nombre, $obj->descripcion, $obj->precio, $obj->stock, $obj->img);
        array_push($arrayProductos, $producto);
    }
    
    return $arrayProductos;
}

public static function findById($id) {
    $sql = "select * from producto where codProd = ?;";
    $datos = array($id);
    $devuelve = parent::ejecuta($sql,$datos);
    $obj = $devuelve->fetchObject();
    if($obj){
        $producto = new Producto($obj->codProd, $obj->nombre, $obj->descripcion, $obj->precio, $obj->stock, $obj->img);
        return $producto;
    } else {
        return null;
    }
}

public static function insert($objeto) {
    $sql = "insert into producto values (?, ?, ?, ?, ?, ?);";
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
    $sql = "update producto set nombre = ?, descripcion = ?, precio = ?, stock = ?, img = ?  where codProd = ?;";
    $datos = array($obj->nombre, $obj->descripcion, $obj->precio, $obj->stock, $obj->img);
    $devuelve = parent::ejecuta($sql,$datos);
    if($devuelve->rowCount() == 0) {
        return false;
    } else {
        return true;
    }
}

public static function delete($id) {
    $sql = "delete from producto where codProd = ?;";
    $datos = array($id);
    $devuelve = parent::ejecuta($sql,$datos);
    if($devuelve->rowCount() == 0) {
        return false;
    } else {
        return true;
    }
}

}