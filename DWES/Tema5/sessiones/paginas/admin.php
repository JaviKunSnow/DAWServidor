<?php

session_start();
require '../funciones/funciones.php';

if(!estaValidado() || !esAdmin()) {
    header('location: ../login.php');
    exit();
}

?>
<h1>Admin</h1>
