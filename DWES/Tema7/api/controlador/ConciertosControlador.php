<?php

class ConciertosControlador extends ControladorPadre {

    public static function controlar() {
        $metodo = $_SERVER['REQUEST_METHOD'];
        switch($metodo) {
            case 'GET':
                self::buscar();
                break;
            case 'POST':
                self::insertar();
                break;
            case 'PUT':
                self::modificar();
                break;
            case 'DELETE':
                self::borrar();
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