<?php

class Ventas {
    private $id_venta;
    private $usuario;
    private $fechacomp;
    private $cod_producto;
    private $cantidad;
    private $precio_total;

    public function __construct($id_venta, $usuario, $fechacomp, $cod_producto, $cantidad, $precio_total) {
        $this->id_venta = $id_venta;
        $this->usuario = $usuario;
        $this->fechacomp = $fechacomp;
        $this->cod_producto = $cod_producto;
        $this->precio_total = $precio_total;
        $this->cantidad = $cantidad;

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