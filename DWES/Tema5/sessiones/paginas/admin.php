<?php

session_start();
require '../funciones/funciones.php';

if(!estaValidado() || !esAdmin()) {
    header('location: ../login.php');
    exit;
}

?>
<header>
    <h2><?echo $_SESSION["nombre"]?></h2>
    <a href="../logout.php">log out</a>
</header>
<h1>Admin</h1>
