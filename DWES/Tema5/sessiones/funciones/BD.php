<?php

require("../seguro/conexion.php");

function validaUser($user, $pass) {
    try {
        $conexion = new PDO("mysql:host=".$_SERVER["SERVER_ADDR"].";dbname=".BBDD, USER, PASS);
        $sql = "select * from usuarios where usuario = ? and clave = ?";
        $sql_p = $conexion->prepare($sql);
        $pass_e = sha1($pass);
        $array = array($user, $pass_e);
        $sql_p->execute($array);

        //si devuelve algo retorna true
        if($sql_p->rowCount() == 1){
            session_start();
            $_SESSION['validado'] = true;
            $row = $sql_p->fetch();
            $_SESSION['user'] = $user;
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['perfil'] = $row['perfil'];
            unset($conexion);
            return true;
        } else {
            // si no, no retorna falso
            unset($conexion);
            return false;
        }



    } catch (Exception $ex) {
        print_r($ex);
        unset($conexion);
    }

}

?>