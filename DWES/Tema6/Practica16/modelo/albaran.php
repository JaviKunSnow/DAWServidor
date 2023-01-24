<?php

class Albaran {

    private $id_albaran;
    private $fechaalb;
    private $cod_producto;
    private $cantidad;
    private $usuario;

    public function __construct($id_albaran, $fechaalb, $cod_producto, $cantidad, $usuario) {
        $this->id_albaran = $id_albaran;
        $this->fechaalb = $fechaalb;
        $this->cod_producto = $cod_producto;
        $this->cantidad = $cantidad;
        $this->usuario = $usuario;

    }

    public function __get($get) {
        if(property_exists(__CLASS__, $get)) {
            return $this->$get;
        }
        
        return null;
    }

    public function __set($clave,$valor) {
        if(property_exists(__CLASS__, $clave)) {
           return $this->$clave = $valor;
        }
        
        return null;
    }

}

?>