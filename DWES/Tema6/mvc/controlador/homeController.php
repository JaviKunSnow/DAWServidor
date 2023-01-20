<?php

if(isset($_REQUEST['ver'])) {

    $_SESSION['vista'] = $vistas['producto'];
    $_SESSION['controlador'] = $controladores['producto'];
    require_once $_SESSION['controlador'];

} else {

    $arrayProductos = ProductoDAO::findAll();
}


?>