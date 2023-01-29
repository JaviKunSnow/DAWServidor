<script src="webroot/js/disabled.js"></script>

<?php

require("./config/configuracion.php");

session_start();

if(isset($_REQUEST['home'])){

    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['pagina'] = 'home';
    $_SESSION['vista'] = $vistas['home'];
    require_once($_SESSION['controlador']);

} else if(isset($_REQUEST["logout"])) {

    session_destroy();

    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['vista'] = $vistas['home'];
    $_SESSION['pagina'] = 'home';

    header('location: index.php');

} else {
    if(!isset($_SESSION['pagina'])){
        $_SESSION['controlador'] = $controladores['home'];
        $_SESSION['pagina'] = 'home';
        $_SESSION['vista'] = $vistas['home'];
        require_once($_SESSION['controlador']);

    } else if(isset($_REQUEST['login'])) {

        $_SESSION['controlador'] = $controladores['login'];
        $_SESSION['pagina'] = 'login';
        $_SESSION['vista'] = $vistas['login'];

    } else if(isset($_REQUEST['registro'])) {

        $_SESSION['pagina'] = 'registro';
        $_SESSION['controlador'] = $controladores['registro'];
        $_SESSION['vista'] = $vistas['registro'];

    } else if(isset($_SESSION['pagina'])) {

        if(isset($_SESSION['perfil'])) {

            $_SESSION['controlador'] = $controladores['user'];
            $_SESSION['pagina'] = 'user';
            $_SESSION['vista'] = $vistas['user'];

        } else {

            require_once($_SESSION['controlador']);

        }
    }
}


require_once('./vista/layout.php');
?>