<?php

if(isset($_REQUEST["producto"])) {
    $_SESSION['controlador'] = $controladores['producto'];
    $_SESSION['vista'] = $vistas['productos'];
    require_once($_SESSION['controlador']);
} else if(isset($_REQUEST["venta"])) {
    $_SESSION['controlador'] = $controladores['venta'];
    $_SESSION['vista'] = $vistas['venta'];
    require_once($_SESSION['controlador']);
} if(isset($_REQUEST["albaran"])) {
    $_SESSION['controlador'] = $controladores['albaran'];
    $_SESSION['vista'] = $vistas['albaran'];
    require_once($_SESSION['controlador']);
}

?>