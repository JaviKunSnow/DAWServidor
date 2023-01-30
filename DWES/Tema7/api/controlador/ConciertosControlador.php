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
        $recurso = self::recurso();
        if(count($recurso) == 2){
            if(!$parametros) {
                // listar
                $lista = ConciertoDAO::findAll();
                $data = json_encode($lista);
                self::respuesta($data, array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
            } else {
                if(isset($_GET['fecha']) && isset($_GET['ordenF'])) {
                    $concierto = ConciertoDAO::findByDate($_GET['fecha'], $_GET['ordenF']);
                    $data = json_encode($concierto);
                    self::respuesta($data, array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
                } else if(isset($_GET['fecha'])){
                    $concierto = ConciertoDAO::findByDate($_GET['fecha']);
                    $data = json_encode($concierto);
                    self::respuesta($data, array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
                } else if(isset($_GET['ordenF'])) {
                    if($_GET['ordenF'] != "ASC" && $_GET['ordenF'] != "DESC") {
                        self::respuesta('',array('HTTP/1.1 400 El filtro de fecha debe ser ASC o DESC'));
                    } else {
                        $concierto = ConciertoDAO::findOrderByDate($_GET['ordenF']);
                        $data = json_encode($concierto);
                        self::respuesta($data, array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
                    }
                } else {
                    self::respuesta('',array('HTTP/1.1 404 No se ha utilizado el filtro correcto'));
                }
            }
        } else if(count($recurso) == 3) {
                // listar
                $concierto = ConciertoDAO::findById($recurso[2]);
                $data = json_encode($concierto);
                self::respuesta($data, array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
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