<?php

// bbdd

require_once ("./config/conexion.php");

// modelo

// core

require_once ("./core/funciones.php");
require_once ("./core/valida.php");

// DAO

require_once("./dao/factoryBD.php");
require_once("./dao/DAO.php");
require_once("./modelo/usuario.php");
require_once("./dao/usuarioDAO.php");

// controladores
$controladores = array(
    'login' => 'loginController.php'
);


// vistas
$vistas = array(
    'home' => 'homeView.php',
    'login' => 'loginView.php'
);

?>