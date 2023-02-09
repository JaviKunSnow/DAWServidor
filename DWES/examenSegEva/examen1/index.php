<?php

require("./config/configuracion.php");

session_start();

if(isset($_REQUEST["logout"])) {
    session_destroy();
    $_SESSION['pagina'] = 'login';
    $_SESSION['controlador'] = $controladores['login'];
    $_SESSION['vista'] = $vistas['login'];
    setcookie("usuario", time()-100);
    header('location: index.php');

} else {
    if(!isset($_SESSION['pagina'])) {
        $_SESSION['pagina'] = 'login';
        $_SESSION['controlador'] = $controladores['login'];
        $_SESSION['vista'] = $vistas['login'];
    } else {
        require_once($_SESSION['controlador']);
    }
}


require_once('./view/layout.php');
?>