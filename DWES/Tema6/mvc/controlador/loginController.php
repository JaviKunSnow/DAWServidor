<?php

$user = $_REQUEST["user"];
$pass = $_REQUEST["pass"];

if(empty($user)){
    $_SESSION['error'] = "Debe rellenar la contraseña";
} elseif (empty($pass)) {
    $_SESSION['error'] = "Debe rellenar la contraseña";
}

?>