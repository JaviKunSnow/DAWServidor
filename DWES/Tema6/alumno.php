<?php

require_once("./objetos2.php");

require_once("./interfaces.php");

class Alumno extends Persona implements Acciones{
    
    private $curso;

    public function __construct($nombre, $edad, $email, $curso) {
        parent::__construct($nombre, $edad, $email);
        $this->curso = $curso;
    }

    public function __toString() {
        return "Id: ".parent::$id.", Nombre: ".$this->nombre.", Edad: ".$this->edad.", curso: ".$this->curso."<br>";
    }

    public function darBaja() {
        $this->curso = null;
    }
}

?>