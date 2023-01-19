<?php

require("./config/configuracion.php");

session_start();

if(isset($_REQUEST["logout"])) {
    session_destroy();
}

if(estaValidado() && !isset($_SESSION['pagina'])) {
    $_SESSION['vista'] = $vistas['home'];
} else if((!estaValidado() && !isset($_SESSION['pagina'])) || isset($_REQUEST['login'])) {
    $_SESSION['pagina'] = 'login';
    $_SESSION['controlador'] = $controladores['login'];
    $_SESSION['vista'] = $vistas['login'];
} elseif (isset($_SESSION['pagina'])) {
    require_once($_SESSION['controlador']);
}

require_once('./vista/layout.php');
?>