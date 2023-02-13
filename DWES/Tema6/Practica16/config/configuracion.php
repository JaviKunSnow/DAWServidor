<?php

// bbdd

require_once ("./config/conexion.php");

// modelo

// core

require_once ("./core/funciones.php");

// DAO

require_once("./dao/factoryBD.php");
require_once("./dao/DAO.php");
require_once("./modelo/usuario.php");
require_once("./modelo/producto.php");
require_once("./modelo/albaran.php");
require_once("./modelo/ventas.php");
require_once("./dao/usuarioDAO.php");
require_once("./dao/productoDAO.php");
require_once("./dao/albaranDAO.php");
require_once("./dao/ventasDAO.php");

// controladores
$controladores = array(
    'login' => './controlador/loginController.php',
    'user' => './controlador/userController.php',
    'registro' => './controlador/registroController.php',
    'home' => './controlador/homeController.php',
    'producto' => './controlador/productoController.php',
    'admin' => './controlador/adminController.php',
    'venta' => './controlador/ventaController.php',
    'editarProducto' => './controlador/editarProductoController.php',
    'compra' => './controlador/compraController.php'
);


// vistas
$vistas = array(
    'home' => './vista/homeView.php',
    'login' => './vista/loginView.php',
    'user' => './vista/UserView.php',
    'registro' => './vista/registroView.php',
    'comprar' => './vista/verProductoView.php',
    'admin' => './vista/adminView.php',
    'productos' => './vista/productosView.php',
    'albaran' => './vista/albaranView.php',
    'venta' => './vista/ventasView.php',
    'editarProducto' => './vista/editarProductosView.php',
    'compra' => './vista/comprarProductoView.php'
);

?>