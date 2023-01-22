<?php

class Producto {

    private $cod_producto;
    private $nombre;
    private $descripcion;
    private $foto;
    private $precio;
    private $stock;

    public function __construct($cod_producto, $nombre, $descripcion, $foto, $precio, $stock) {
        $this->cod_producto = $cod_producto;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->foto = $foto;
        $this->precio = $precio;
        $this->stock = $stock;

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