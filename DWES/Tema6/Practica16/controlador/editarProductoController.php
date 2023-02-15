<?php

if($_SESSION["accionProducto"] == "editar") {
    $producto = productoDAO::findById($_SESSION['producto']);
    if(isset($_REQUEST["enviar"])) {
        $nuevo = new Producto($_REQUEST['cod_producto'], $_REQUEST["nombreP"], $_REQUEST["desc"], $_REQUEST["foto"], $_REQUEST["precioP"], $_REQUEST["stockP"]);
        if(ProductoDAO::update($nuevo)){
            
        } else {
            $_SESSION["error"] = "No se ha podido modificar el producto.";
        }
    }
} else if($_SESSION["accionProducto"] == "insertar") {
    if(isset($_REQUEST["enviar"])) {
        $nuevo = new Producto($_REQUEST['cod_producto'], $_REQUEST["nombreP"], $_REQUEST["desc"], $_FILES['fichero']['name'], $_REQUEST["precioP"], $_REQUEST["stockP"]);
        if(ProductoDAO::insert($nuevo)){
                
        } else {
            $_SESSION["error"] = "No se ha podido insertar el producto.";
        }
    }
}


?>