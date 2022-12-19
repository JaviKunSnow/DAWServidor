<?php

require "./core/funcionesCookies.php";
require "./config/datosBD.php";
require "./modelo/ConexionBD.php";
require './dao/DAO.php';
require "./modelo/Usuario.php";
require './dao/UsuarioDAO.php';
require "./modelo/Reserva.php";
require './dao/ReservaDAO.php';
require "./modelo/Pista.php";
require "./dao/PistaDAO.php";

$controladores = [
    'login' => 'controlador/cLogin.php',
    'registro' => 'controlador/cRegistro.php',
    'perfil' => 'controlador/cPerfil.php',
    'pista' => 'controlador/cPista.php',
    'reserva' => 'controlador/cReserva.php',
    'perfil' => 'controlador/cPerfil.php',
    'usuarios' => 'controlador/cUsuarios.php'
];

$vistas = [
    'login' => 'vista/vLogin.php',
    'layout' => 'vista/vLayout.php',
    'registro' => 'vista/vRegistro.php',
    'perfil' => 'vista/vPerfil.php',
    'pista' => 'vista/vListaPistas.php',
    'nuevaPista' => 'vista/vNuevaPista.php',
    'modPista' => 'vista/vModPista.php',
    'reserva' => 'vista/vListaReservas.php',
    'usuarios' => 'vista/vListaUsuarios.php',
    'modUsuarios' => 'vista/vModUsuario.php',
    'reservado' => 'vista/vReservado.php',
];