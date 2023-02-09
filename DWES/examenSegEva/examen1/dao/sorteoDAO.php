<?php

class SorteoDAO extends FactoryBD implements DAO {

    public static function findAll() {
        $sql = "select * from sorteo;";
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arraySorteo = array();
        while($obj = $devuelve->fetchObject()){
            $sorteo = new Sorteo($obj->id, $obj->fecha, $obj->n1, $obj->n2, $obj->n3, $obj->n4, $obj->n5);
            array_push($arraySorteo, $sorteo);
        }
        
        return $arraySorteo;
    }

    public static function findById($id) {
        $sql = "select * from sorteo where id = ?;";
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();
        if($obj){
            $sorteo = new Sorteo($obj->id, $obj->fecha, $obj->n1, $obj->n2, $obj->n3, $obj->n4, $obj->n5);
            return $sorteo;
        } else {
            return null;
        }
    }

    public static function insert($objeto) {
        $sql = "insert into sorteo values (?, ?, ?, ?, ?, ?, ?);";
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

    public static function update($objeto) {
        $sql = "update sorteo set n1 = ?, n2 = ?, n3 = ?, n4 = ?, n5 = ? where id = ?;";
        $datos = array($objeto->n1, $objeto->n2, $objeto->n3, $objeto->n4, $objeto->n5, $objeto->id);
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function delete($id) {
        $sql = "delete from usuarios where id = ?;";
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