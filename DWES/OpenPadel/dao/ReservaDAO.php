<?php

class ReservaDAO implements DAO{
    public static function findAll(){
    $sql = "select id_reserva, id_pista, fecha_reserva, hora_reserva, reservado, usuario from reservas;";
    $consulta =ConexionBD::ejecutaConsulta($sql, []);
    $cont =0;
    while($row = $consulta->fetchObject())
    {
        $reserva = new Reserva($row->id_reserva,$row->id_pista,$row->fecha_reserva,$row->hora_reserva,$row->reservado,$row->usuario);
            $registros[$cont]=$reserva;
            $cont++;
    }
    return $registros;

}
    //busca por id(busca por la clave primaria)
    public static function findById($id){
            $sql = "select id_reserva ,id_pista, fecha_reserva, hora_reserva, reservado, usuario from reservas where id_reserva = ?;";
            $consulta =ConexionBD::ejecutaConsulta($sql, [$id]);
            $row = $consulta->fetchObject();
            $reserva = new Reserva($row->id_reserva,$row->id_pista,$row->fecha_reserva,$row->hora_reserva,$row->reservado,$row->usuario);
            return $reserva;
    }
    //modifica o actualiza
    public static function update($objeto){
        $sql = "update reservas set id_pista=?, fecha_reserva=?, hora_reserva=?, reservado=?, usuario=? where id_reserva=?;";
        $arrayParametros=[$objeto->id_pista,$objeto->fecha_reserva,$objeto->hora_reserva,$objeto->reservado,$objeto->usuario,$objeto->id_reserva];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
    }
    //crear o insertar
    public static function save($objeto){
        $sql = "insert into reservas (id_pista,fecha_reserva,hora_reserva,reservado,usuario) values (?,?,?,?,?);";
        $arrayParametros=[$objeto->id_pista,$objeto->fecha_reserva,$objeto->hora_reserva,$objeto->reservado,$objeto->usuario];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
    }
    //borrar
    public static function delete($objeto)
    {
        
    }
    public static function deleteById($id)
    {
        $sql = "delete from reservas where id_reserva=?;";
    
        $arrayParametros = [$id];
        $consulta = ConexionBD::ejecutaConsulta($sql,$arrayParametros);
        
    }

    public static function getReservaHora($hora){
        $sql = "select * from reservas where hora_reserva = ?";
        $consulta = ConexionBD::ejecutaConsulta($sql,[$hora]);
        $cont = 0;
        $reserva = null;
        while ($row = $consulta->fetchObject()) {
            $reserva  = new Reserva($row->id_reserva,$row->id_pista,$row->fecha_reserva,$row->hora_reserva,$row->reservado,$row->usuario);
            $registros[$cont]=$reserva;
            $cont++;
        }
        return $registros;
    }

    public static function getReservaDia($dia){
        $sql = "select * from reservas where fecha_reserva = ?";
        $consulta = ConexionBD::ejecutaConsulta($sql,[$dia]);
        $cont = 0;
        $reserva = null;
        while ($row = $consulta->fetchObject()) {
            $reserva  = new Reserva($row->id_reserva,$row->id_pista,$row->fecha_reserva,$row->hora_reserva,$row->reservado,$row->usuario);
            $registros[$cont]=$reserva;
            $cont++;
        }
        return $registros;
    }

    public static function getReservaDiaHora($dia,$hora){
        $sql = "select * from reservas where fecha_reserva = ? and hora_reserva = ?";
        $consulta = ConexionBD::ejecutaConsulta($sql,[$dia,$hora]);
        $cont = 0;
        $reserva = null;
        while ($row = $consulta->fetchObject()) {
            $reserva  = new Reserva($row->id_reserva,$row->id_pista,$row->fecha_reserva,$row->hora_reserva,$row->reservado,$row->usuario);
            $registros[$cont]=$reserva;
            $cont++;
        }
        return $registros;
    }

    public static function findDias(){
        $sql = "select distinct fecha_reserva from reservas;";
        $consulta =ConexionBD::ejecutaConsulta($sql, []);
        $registros = array('');
        while($row = $consulta->fetchObject())
        {
            array_push($registros,$row->fecha_reserva);
        }
        return $registros;
    }
    //modifica o actualiza
    public static function updateReservado($usuario,$id){
        $sql = "update reservas set reservado=1, usuario=? where id_reserva=?;";
        $consulta = ConexionBD::ejecutaConsulta($sql,[$usuario,$id]);
    }
}
