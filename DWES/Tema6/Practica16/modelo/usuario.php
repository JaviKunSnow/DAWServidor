<?php

class Usuario {
    
    private $usuario;
    private $nombre;
    private $pass;
    private $correo;
    private $fechanac;
    private $perfil;

    public function __construct($usuario, $nombre, $pass, $correo, $fechanac, $perfil) {
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->pass = $pass;
        $this->correo = $correo;
        $this->fechanac = $fechanac;
        $this->perfil = $perfil;

    }

    public function __get($get) {
        if(property_exists(__CLASS__, $get)) {
            return $this->$get;
        }
        
        return null;
    }

    public function __set($clave,$valor) {
        if(property_exists(__CLASS__, $clave)) {
           return $this->$clave = $valor;
        }
        
        return null;
    }


}

?>