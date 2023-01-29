<?php

if(isset($_REQUEST["editar"])) {
    $_SESSION['accion'] = 'editar';
    $usuario = UsuarioDAO::findById($_SESSION['user']);
    $_SESSION['vista'] = $vistas['user'];
} else if(isset($_REQUEST["guardar"])){
    $usuario = UsuarioDAO::findById($_SESSION['user']);
    $usuario->nombre = $_REQUEST["nombre"];
    $usuario->pass = $_REQUEST["pass"];
    $usuario->correo = $_REQUEST["correo"];
    $usuario->perfil = $_REQUEST["perfil"];
    $_SESSION['vista'] = $vistas['user'];
    if(!UsuarioDAO::update($usuario)){
        $_SESSION['error'] = "no se ha podido modificar";
        $_SESSION['accion'] = 'editar';
    }
} else {
    $usuario = UsuarioDAO::findById($_SESSION['user']);
    $_SESSION['vista'] = $vistas['user'];   
}


?>