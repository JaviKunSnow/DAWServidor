<?php

session_start();
require '../funciones/funciones.php';

if(!estaValidado()) {
    header('location: ../login.php');
    exit;
}

?>
<header>
    <h2><?echo $_SESSION["nombre"]?></h2>
    <a href="../logout.php">log out</a>
</header>

<?
    if(esModerador()) {
        ?>
        <h1>moderador</h1>
        <?
    } else {
        ?>
        <h1>usuario</h1>
        <?
    }
?>