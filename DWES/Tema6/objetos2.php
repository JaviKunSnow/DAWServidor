<?php

class Persona {
    private $nombre;
    private $edad;
    private $email;
    public static $id = 0;

    public function __construct($nombre, $edad, $email) {
        self::$id = self::$id + 1;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->email = $email;
    }

    public function __destruct() {
        //echo "se destruye ".$this;
    }

    public function __get($get) {
        return $this->$get;
    }

    public function __set($clave,$valor) {
        $this->$clave = $valor;
    }

    public function __toString() {
        return "Id: ".$this->id.", Nombre: ".$this->nombre.", Edad: ".$this->edad."<br>";
    }

    public function __clone() {
        //$this->id = $this->id + 1;
    }
}

?>