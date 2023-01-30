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
        // recurso conciertos y nada despues
        // conciertos y despues id
        if(count(self::recurso()) == 2){
            if(!$parametros) {
                // listar
                $lista = ConciertoDAO::findAll();
                $data = json_encode($lista);
                self::respuesta($data, array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
            }
        }
    }

    public function insertar() {

    }

    public function modificar() {

    }

    public function borrar() {

    }

    
}

?>