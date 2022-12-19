<?php

class Usuario{
    private $usuario;
    private $nombre;
    private $apellidos;
    private $clave;
    private $email;
    private $fecha_nacimiento;
    private $perfil;
    private $medias;
    //private $fechaUltConexion;

    function __construct($usu,$nom,$apell,$pass,$email,$fecha,$perfil,$medias)
    {
        $this->usuario = $usu;
        $this->nombre = $nom;
        $this->apellidos = $apell;
        $this->clave = $pass;
        $this->email = $email;
        $this->fecha_nacimiento = $fecha;
        $this->perfil = $perfil;
        $this->medias = $medias;
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