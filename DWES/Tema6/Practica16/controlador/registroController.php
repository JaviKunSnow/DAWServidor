<?php

if(isset($_REQUEST["guardar"])) {
    // VALIDACIONES
    if(compTodo()) {
        $usuario = new Usuario($_REQUEST["user"], $_REQUEST["nombre"], sha1($_REQUEST["pass"]), $_REQUEST["correo"], $_REQUEST["fecha"], $_REQUEST["perfil"]);
        if(UsuarioDAO::insert($usuario)) {
            $_SESSION['controlador'] = $controladores['home'];
            $_SESSION['vista'] = $vistas['home'];
            $_SESSION['validado'] = true;
            $_SESSION['user'] = $usuario->usuario;
            $_SESSION['nombre'] = $usuario->nombre;
            $_SESSION['perfil'] = $usuario->perfil;
    
        } else {
            $_SESSION['error'] = "no se ha podido registrar";
        }
    } else {

    }
    // $_SESSION['ERROR'] con el motivo de que no valida

}

?>