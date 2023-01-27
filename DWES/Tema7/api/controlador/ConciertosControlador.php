<?php

class ConciertosControlador extends ControladorPadre {

    public function controlar() {
        $metodo = $_SERVER['REQUEST_METHOD'];
        switch($metodo) {
            case 'GET':
                $this->buscar();
                break;
            case 'POST':
                $this->insertar();
                break;
            case 'PUT':
                $this->modificar();
                break;
            case 'DELETE':
                $this->borrar();
                break;
            default:
                ControladorPadre::respuesta('',array('HTTP/1.1 404 No se indica recurso'));
        }
    }

    public function buscar() {
        $parametros = $this->parametros();
    }

    public static function insertar() {

    }

    public static function modificar() {

    }

    public static function borrar() {

    }

    
}

?>