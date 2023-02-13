<?php

if(isset($_REQUEST['comprar'])) {
    $_SESSION['producto'] = $_REQUEST['cod_producto'];
    $_SESSION['vista'] = $vistas['compra'];
    $_SESSION['controlador'] = $controladores['compra'];
    require_once $_SESSION['controlador'];

} else {

    $arrayProductos = ProductoDAO::findAll();
}

?>