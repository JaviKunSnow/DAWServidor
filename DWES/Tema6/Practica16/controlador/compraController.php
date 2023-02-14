<?php

if(!isset($_SESSION["compra"])) {
    $_SESSION["compra"] = false;
} 

if(isset($_REQUEST["comprado"])) {
    $venta = new Ventas(null, $_SESSION["user"], date('Y-m-d'), $_REQUEST["cod_producto"], $_REQUEST["stock"], $_REQUEST["precio"] * $_REQUEST["stock"]);
    if(VentasDAO::insert($venta)) {
        $_SESSION["compra"] = true;
        ProductoDAO::buy($_REQUEST["cod_producto"], $_REQUEST["stock"]);
    }
} else if(isset($_REQUEST["menu"])) {
    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['vista'] = $vistas['home'];
    $_SESSION["compra"] = false;

} else {
    $producto = ProductoDAO::findById($_SESSION['producto']);
}

?>