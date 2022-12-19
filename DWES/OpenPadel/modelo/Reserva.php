<?php

class Reserva{
    private $id_reserva;
    private $id_pista;
    private $fecha_reserva;
    private $hora_reserva;
    private $reservado;
    private $usuario;

    function __construct($reserva,$pista,$fecha,$hora,$reservado,$usuario)
    {
        $this->id_reserva = $reserva;
        $this->id_pista = $pista;
        $this->fecha_reserva = $fecha;
        $this->hora_reserva = $hora;
        $this->reservado = $reservado;
        $this->usuario = $usuario;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name,$valor)
    {
        $this->$name = $valor;
    }
}