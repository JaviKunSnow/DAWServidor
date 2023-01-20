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
require_once("./modelo/producto.php");
require_once("./dao/usuarioDAO.php");
require_once("./dao/productoDAO.php");

// controladores
$controladores = array(
    'login' => './controlador/loginController.php',
    'user' => './controlador/userController.php',
    'registro' => './controlador/registroController.php',
    'home' => './controlador/homeController.php',
    'producto' => './controlador/productoController.php'
);


// vistas
$vistas = array(
    'home' => 'homeView.php',
    'login' => 'loginView.php',
    'user' => 'UserView.php',
    'registro' => 'registroView.php',
    'producto' => 'verProductoView.php'
);

?>