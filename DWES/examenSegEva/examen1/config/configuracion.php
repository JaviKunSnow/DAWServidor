<?php

// bbdd

require_once ("./config/conexion.php");

// modelo

// core

require_once ("./core/funciones.php");

// DAO

require_once("./dao/factoryBD.php");
require_once("./dao/DAO.php");
require_once("./model/usuario.php");
require_once("./model/sorteo.php");
require_once("./model/apuesta.php");
require_once("./dao/usuarioDAO.php");
require_once("./dao/sorteoDAO.php");
require_once("./dao/apuestaDAO.php");

// controladores
$controladores = array(
    'login' => './controller/loginController.php',
    'home' => './controller/homeController.php',
    'admin' => './controller/adminController.php'
);


// vistas
$vistas = array(
    'home' => './view/homeView.php',
    'login' => './view/loginView.php',
    'admin' => './view/adminView.php',
);

?>