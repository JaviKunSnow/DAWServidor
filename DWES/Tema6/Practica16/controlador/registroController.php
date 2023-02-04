<?php

if(isset($_REQUEST["guardar"])) {
    // VALIDACIONES
    if(compTodo()) {
        $usuario = new Usuario($_REQUEST["user"], $_REQUEST["nombre"], sha1($_REQUEST["pass"]), $_REQUEST["correo"], $_REQUEST["fecha"], $_REQUEST["perfil"]);
        if(UsuarioDAO::insert($usuario)) {
            $_SESSION['registrado'] = true;
            require_once('./vista/layout.php');
    
        } else {
            $_SESSION['error'] = "no se ha podido registrar";
        }
    } else {

    }
    //$_SESSION['ERROR'];

}

?>