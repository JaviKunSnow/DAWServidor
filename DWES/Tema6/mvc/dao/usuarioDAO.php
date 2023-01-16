<?php

class UsuarioDAO extends FactoryBD implements DAO {

    public static function findAll() {
        $sql = "select * from usuarios;";
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        while($obj = $devuelve->fetchObject()){
            print_r($obj);
        }
    }

    public static function findById($id) {

    }

    public static function insert($objeto) {

    }

    public static function update($objeto) {

    }

    public static function delete($objeto) {

    }
}

?>