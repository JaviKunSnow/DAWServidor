<?php

class UsuarioDAO extends FactoryBD implements DAO {

    public static function findAll() {
        $sql = "select * from usuarios;";
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayUsuarios = array();
        while($obj = $devuelve->fetchObject()){
            $usuario = new Usuario($obj->usuario, $obj->nombre, $obj->pass, $obj->correo, $obj->fechanac, $obj->perfil);
            array_push($arrayUsuarios, $usuario);
        }
        
        return $arrayUsuarios;
    }

    public static function findById($id) {
        $sql = "select * from usuarios where usuario = ?;";
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();
        if($obj){
            $usuario = new Usuario($obj->usuario, $obj->nombre, $obj->pass, $obj->correo, $obj->fechanac, $obj->perfil);
            return $usuario;
        } else {
            return null;
        }
    }

    public static function insert($objeto) {
        $sql = "insert into usuarios values (?, ?, ?, ?, ?, ?);";
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
        $sql = "update usuarios set pass = ?, nombre = ?, correo = ?, perfil = ? where usuario = ?;";
        $datos = array($objeto->pass, $objeto->nombre, $objeto->correo, $objeto->perfil, $objeto->fechanac, $objeto->usuario);
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function delete($id) {
        $sql = "delete from usuarios where usuario = ?;";
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function valida($user, $pass) {
        $sql = "select * from usuarios where usuario = ? and pass = ?;";
        $passh = sha1($pass);
        $datos = array($user, $passh);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();
        if($obj){
            $usuario = new Usuario($obj->usuario, $obj->nombre, $obj->pass, $obj->correo, $obj->fechanac, $obj->perfil);
            return $usuario;
        } else {
            return null;
        }
    }

}

?>