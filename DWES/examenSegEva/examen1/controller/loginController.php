<?php

if(isset($_REQUEST["user"])){
    $user = $_REQUEST["user"];
    $pass = $_REQUEST["pass"];
        
        if(empty($user)){
            $_SESSION['error'] = "Debe rellenar la contraseña";
        } elseif (empty($pass)) {
            $_SESSION['error'] = "Debe rellenar la contraseña";
        } else {
            $usuario = UsuarioDAO::valida($user, $pass);
            if($usuario != null) {
                $_SESSION['validado'] = true;
                $_SESSION['user'] = $user;
                $_SESSION['id'] = $usuario->id;
                $_SESSION['perfil'] = $usuario->perfil;
                if(esAdmin()) {
                    $_SESSION['vista'] = $vistas['admin'];
                    $_SESSION['controlador'] = $controladores['admin'];
                    header ('location: ./index.php');
                } else {
                    $_SESSION['vista'] = $vistas['home'];
                    $_SESSION['controlador'] = $controladores['home'];
                    header ('location: ./index.php');
                }

                if(isset($_REQUEST["recuerda"])){
                    setcookie("usuario",$_REQUEST["user"]);
                }
            }
        }
    }

?>