<?php

class ControladorPadre{

    public static function recurso(){
        if(isset($_SERVER['PATH_INFO'])) {
            $uri = $_SERVER['PATH_INFO'];
            $uri = explode('/',$uri);
            return $uri;
        } else {
            // retorna un error de la api
            ControladorPadre::respuesta('',array('HTTP/1.1 404 No se indica recurso'));
            return null;
        }

    }

    protected function parametros(){
        $uri = $_SERVER['QUERY_STRING'];
        $uri = explode('/',$uri);
        return $uri;
    }

    public static function respuesta($datos, $httpHeaders = array()) {
        foreach($httpHeaders as $value) {
            header($value);
        }
        echo $datos;
        exit;
    }
}

?>