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
            case 'PATCH':
                $this->editar();
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
                if(isset($_GET['fecha']) && isset($_GET['ordenF']) && count($_GET) == 2) {
                    
                    $concierto = ConciertoDAO::findByDateOrder($_GET['fecha'], $_GET['ordenF']);
                    $data = json_encode($concierto);
                    self::respuesta($data, array('Content-Type: application/json', 'HTTP/1.1 200 OK'));

                } else if(isset($_GET['fecha']) && count($_GET) == 1){

                    $concierto = ConciertoDAO::findByDate($_GET['fecha']);
                    $data = json_encode($concierto);
                    self::respuesta($data, array('Content-Type: application/json', 'HTTP/1.1 200 OK'));

                } else if(isset($_GET['ordenF']) && count($_GET) == 1) {
                    
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
        $body = file_get_contents('php://input');
        $dato = json_decode($body);

        if(isset($dato->grupo) && isset($dato->fecha) && isset($dato->precio) && isset($dato->lugar)) {
            $concierto = new Concierto($dato->grupo, $dato->fecha, $dato->precio, $dato->lugar);
            if(ConciertoDAO::insert($concierto)) {
                self::respuesta('', array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
            }
        } else {
            self::respuesta('', array('JSON no tiene un formato correcto'));
        }

    }

    public function modificar() {
        $recurso = self::recurso();
        if(count($recurso) == 3) {
            $body = file_get_contents('php://input');
            $dato = json_decode($body);

            if(isset($dato->grupo) && isset($dato->fecha) && isset($dato->precio) && isset($dato->lugar)) {
                $concierto = new Concierto($dato->grupo, $dato->fecha, $dato->precio, $dato->lugar);
                $concierto->id = $recurso[2];
                if(ConciertoDAO::update($concierto)) {
                    self::respuesta('', array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
                
                }
            } else {

            self::respuesta('', array('JSON no tiene un formato correcto'));

            }
            
        } else {
            self::respuesta('',array('HTTP/1.1 404 No se ha utilizado el filtro correcto: conciertos/id'));
        }
    }

    public function borrar() {
        $recurso = self::recurso();
        if(count($recurso) == 3) {
            if(ConciertoDAO::delete($recurso[2])) {
                self::respuesta('', array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
            
            }
            
        } else {
            self::respuesta('',array('HTTP/1.1 404 No se ha utilizado el filtro correcto: conciertos/id'));
        }
    }

    public function editar() {
        $recurso = self::recurso();
        if(count($recurso) == 3) {
            $body = file_get_contents('php://input');
            $dato = json_decode($body, true);

            $viejo = ConciertoDAO::findById($recurso[2]);
            
            foreach($dato as $key => $valor) {
                $viejo->$key = $valor;
            }
            ConciertoDAO::update($viejo);

            /*
            if(isset($dato->grupo) || isset($dato->fecha) || isset($dato->precio) || isset($dato->lugar)) {
                if(ConciertoDAO::patch($recurso[2], $dato)) {
                    self::respuesta('', array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
                
                }
            } else {

            self::respuesta('', array('JSON no tiene un formato correcto'));

            }*/
            
        } else {
            self::respuesta('',array('HTTP/1.1 404 No se ha utilizado el filtro correcto: conciertos/id'));
        }
    }
}

?>