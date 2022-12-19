<?php

class Pista{
    private $id_pista;
    private $nombre_pista;

    function __construct($id,$nombre)
    {
        $this->id_pista = $id;
        $this->nombre_pista = $nombre;
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