<?php

if(!isset($_SESSION['registrado'])) {
    $_SESSION['registrado'] = false;
}

if(isset($_REQUEST["registrar"])) {
    // VALIDACIONES
    if(compTodo()) {
        $usuario = new Usuario($_REQUEST["user"], $_REQUEST["nombre"], sha1($_REQUEST["pass"]), $_REQUEST["mail"], $_REQUEST["fecha"], $_REQUEST["rol"]);
        if(UsuarioDAO::insert($usuario)) {
            $_SESSION['registrado'] = true;
            require_once('./vista/layout.php');
    
        } else {
            $_SESSION['error'] = "no se ha podido registrar.";
        }
    } else {
        $_SESSION['error'] = "Has puesto una de las opciones incorrectamente.";
    }

}

?>