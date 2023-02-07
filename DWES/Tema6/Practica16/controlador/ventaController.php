<?php

if(isset($_REQUEST['borrar'])) {
    $_SESSION['venta'] = $_REQUEST['cod_venta'];
    $producto = ventasDAO::delete($_SESSION['venta']);
    $lista = ventasDAO::findAll();
} else if(isset($_REQUEST['editar'])) {
    $_SESSION['venta'] = $_REQUEST['cod_venta'];
    $producto = ventasDAO::findById($_SESSION['venta']);
    $_SESSION['vista'] = $vistas('verVenta');
} else if(isset($_REQUEST['insertar'])) {
    $_SESSION['venta'] = $_REQUEST['cod_venta'];
    $producto = ventasDAO::findById($_SESSION['venta']);
    $_SESSION['vista'] = $vistas('verVenta');
} else {
    $lista = ventasDAO::findAll();
}

?>