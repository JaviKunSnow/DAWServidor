<?php

require("./BD.php");

$user = $_REQUEST["user"];
$pass = $_REQUEST["pass"];

if(validaUser($user, $pass)){
    if($_SESSION["perfil"] == "ADM01") {
        header("location: ../paginas/admin.php");
        exit();
    } else {
        header("location: ../paginas/home.php");
        exit();
    }
} else {
    header("location: ../login.php");
    exit();
}

?>