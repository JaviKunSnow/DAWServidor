<?php

class PistaDAO implements DAO{
    public static function findAll(){
    $sql = "select id_pista, nombre_pista from pistas;";
    $consulta =ConexionBD::ejecutaConsulta($sql, []);
    $cont =0;
    while($row = $consulta->fetchObject())
    {
        $pista = new Pista($row->id_pista,$row->nombre_pista);
            $registros[$cont]=$pista;
            $cont++;
    }
    return $registros;

}
    //busca por id(busca por la clave primaria)
    public static function findById($id){
            $sql = "select id_pista, nombre_pista from pistas where id_pista = ?;";
            $consulta =ConexionBD::ejecutaConsulta($sql, [$id]);
            $row = $consulta->fetchObject();
            $pista = new Pista($row->id_pista,$row->nombre_pista);
            return $pista;
    }
    //modifica o actualiza
    public static function update($objeto){
        $sql = "update pistas set nombre_pista=? where id_pista=?;";
        $arrayParametros=[$objeto->nombre_pista,$objeto->id_pista];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
    }
    //crear o insertar
    public static function save($nombre_pista){
        $sql = "insert into pistas (nombre_pista) values (?);";
        $consulta = ConexionBD::ejecutaConsulta($sql,[$nombre_pista]);
    }
    //borrar
    public static function delete($objeto)
    {
        
    }
    public static function deleteById($id)
    {
        $sql = "delete from pistas where id_pista=?;";
    
        $arrayParametros = [$id];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
        
    }

}
