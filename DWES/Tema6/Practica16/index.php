<script src="webroot/js/disabled.js"></script>

<?php

require("./config/configuracion.php");

session_start();

if(!isset($_SESSION['pagina'])){
    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['pagina'] = 'home';
    $_SESSION['vista'] = $vistas['home'];
    require_once($_SESSION['controlador']);
} else if(isset($_SESSION['login'])) {
    $_SESSION['controlador'] = $controladores['login'];
    $_SESSION['pagina'] = 'login';
    $_SESSION['vista'] = $vistas['login'];
} else if(isset($_SESSION['pagina'])) {
    if(isset($_SESSION['perfil'])) {
        $_SESSION['controlador'] = $controladores['user'];
        $_SESSION['pagina'] = 'user';
        $_SESSION['vista'] = $vistas['user'];
    } else {
        require_once($_SESSION['controlador']);
    }
}


require_once('./vista/layout.php');
?>