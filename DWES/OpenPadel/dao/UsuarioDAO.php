<?php

class UsuarioDAO implements DAO{
    public static function findAll(){
    $sql = "select usuario, nombre, apellidos, email, fecha_nacimiento, perfil, medias from usuarios;";
    $consulta =ConexionBD::ejecutaConsulta($sql, []);
    $cont =0;
    while($row = $consulta->fetchObject())
    {
        $usuario = new Usuario($row->usuario,$row->nombre,$row->apellidos,'',
            $row->email, $row->fecha_nacimiento,$row->perfil,$row->medias);
            $registros[$cont]=$usuario;
            $cont++;
    }
    return $registros;

}
    //busca por id(busca por la clave primaria)
    public static function findById($id){
            $sql = "select usuario, nombre, apellidos, clave, email,fecha_nacimiento, perfil, medias from usuarios where usuario = ?;";
            $consulta =ConexionBD::ejecutaConsulta($sql, [$id]);
            $row = $consulta->fetchObject();
            $user = new Usuario($row->usuario,$row->nombre,$row->apellidos,$row->clave,
            $row->email,$row->fecha_nacimiento, $row->perfil, $row->medias);
            return $user;
    }
    //modifica o actualiza
    public static function update($objeto){
        $sql = "update usuarios set usuario=?, nombre=?, apellidos=?, clave=?, email=?,fecha_nacimiento=?,perfil=?, medias=? where usuario=?;";
        $arrayParametros=[$objeto->usuario,$objeto->nombre,$objeto->apellidos,$objeto->clave,$objeto->email,$objeto->fecha_nacimiento,$objeto->perfil,$objeto->medias,$objeto->usuario];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
    }
    //crear o insertar
    public static function save($objeto){
        $sql = "insert into usuarios (usuario,nombre,apellidos,clave,email,fecha_nacimiento,perfil,medias) values (?,?,?,?,?,?,?,?);";
        $arrayParametros=[$objeto->usuario,$objeto->nombre,$objeto->apellidos,$objeto->clave,$objeto->email,$objeto->fecha_nacimiento,$objeto->perfil,$objeto->medias];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
    }
    //borrar
    public static function delete($objeto)
    {
        
    }
    public static function deleteById($id)
    {
        $sql = "delete from usuarios where usuario=?;";
    
        $arrayParametros = [$id];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
        
    }

    public static function validaUser($user,$pass){
            
            $sql = "select * from usuarios where usuario = ? and clave = ?";
            $consulta = ConexionBD::ejecutaConsulta($sql,[$user,$pass]);
            $cont = 0;
            $usuario = null;
            while ($row = $consulta->fetchObject()) {
                $usuario  = new Usuario($row->usuario,$row->nombre,$row->apellidos,$row->clave,$row->email,$row->fecha_nacimiento,$row->perfil,$row->medias);
            }
            return $usuario;
        }
    
}
