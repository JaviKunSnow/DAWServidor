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
    if(!isset($_SESSION['pagina'])) {
        
        $_SESSION['controlador'] = $controladores['home'];
        $_SESSION['pagina'] = 'home';
        $_SESSION['vista'] = $vistas['home'];
        require_once($_SESSION['controlador']);

    } elseif (isset($_SESSION['pagina'])) {
        if(isset($_REQUEST['login'])) {
        
            $_SESSION['pagina'] = 'login';
            $_SESSION['controlador'] = $controladores['login'];
            $_SESSION['vista'] = $vistas['login'];
            require_once($_SESSION['controlador']);
    
        } else if(isset($_REQUEST['registro'])) {
        
            $_SESSION['pagina'] = 'registro';
            $_SESSION['controlador'] = $controladores['registro'];
            $_SESSION['vista'] = $vistas['registro'];
            require_once($_SESSION['controlador']);
    
        } else if(isset($_REQUEST["perfil"])) {
            
            $_SESSION['accion'] = 'ver';
            $_SESSION['controlador'] = $controladores['user'];
            $_SESSION['vista'] = $vistas['user'];
            require_once($_SESSION['controlador']);

        }else if(esAdmin() && isset($_REQUEST['admin'])){
           
            $_SESSION['controlador'] = $controladores['admin'];
            $_SESSION['pagina'] = 'admin';
            $_SESSION['vista'] = $vistas['admin'];
            require_once($_SESSION['controlador']);

        } else {

            require_once($_SESSION['controlador']);

        }
    }
}

require_once('./vista/layout.php');
?>