<?php

class Persona {
    private $nombre;
    private $edad;
    private $email;
    public static $id = 0;

    public static function elProximoId() {
        return self::$id = self::$id + 1;
    }

    public function __construct($nombre, $edad, $email) {
        self::$id = self::$id + 1;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->email = $email;
    }

    public function __destruct() {
        return self::$id = self::$id - 1;
        //echo "se destruye ".$this;
    }

    public function __get($get) {
        if(property_exists(__CLASS__, $get)) {
            return $this->$get;
        }
        
        return "No existe la propiedad.";
    }

    public function __set($clave,$valor) {
        if(property_exists(__CLASS__, $get)) {
           return $this->$clave = $valor;
        }
        
        return "No existe la propiedad.";
    }

    public function __toString() {
        return "Id: ".$this->id.", Nombre: ".$this->nombre.", Edad: ".$this->edad."<br>";
    }

    public function __clone() {
        //$this->id = $this->id + 1;
    }

    public function verVariables() {
        return get_object_vars($this);
    }
}

?>