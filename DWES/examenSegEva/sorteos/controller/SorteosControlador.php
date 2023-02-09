<?php

class SorteosControlador extends ControladorPadre {

    public function controlar() {
        $metodo = $_SERVER['REQUEST_METHOD'];
        switch($metodo) {
            case 'GET':
                $this->buscar();
                break;
            default:
                ControladorPadre::respuesta('',array('HTTP/1.1 404 No se indica recurso'));
        }
    }

    public function buscar() {
        $parametros = $this->parametros();
        $recurso = self::recurso();
        
        if(count($recurso) == 2){
            if(count($parametros) == 2) {
                $param = array();
                foreach($parametros as $valores) {
                    array_push($param, $valores);
                }

                $numAlt = array(strval(rand($param[0],$param[1])), strval(rand($param[0],$param[1])), 
                strval(rand($param[0],$param[1])), strval(rand($param[0],$param[1])), strval(rand($param[0],$param[1])));
    
                /*$datos = "{
                    'n1': '".$numAlt[0]."',
                    'n2': '".$numAlt[1]."',
                    'n3': '".$numAlt[2]."',
                    'n4': '".$numAlt[3]."',
                    'n5': '".$numAlt[4]."'
                }";*/

                $datos = json_encode($numAlt);
    
                self::respuesta($datos, array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
            }
        }

    }
    
}

?>