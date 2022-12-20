<?php

if(!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: basic Realm="contenido restringido"');
    header('HTTP/1.0 401 Unathorized');
    echo "No autorizado";

} else {
    if($_REQUEST["opc"] == "ins") {
        if($_SERVER['PHP_AUTH_USER'] == 'javier' && $_SERVER['PHP_AUTH_PW'] == 'javier' || $_SERVER['PHP_AUTH_USER'] == 'admin' && $_SERVER['PHP_AUTH_PW'] == 'javier') {
            header('location: ./editaBD.php?opc='.$_REQUEST["opc"].'');
            exit();
        }
    } else if($_REQUEST["opc"] == "elm") {
        if($_SERVER['PHP_AUTH_USER'] == 'admin' && $_SERVER['PHP_AUTH_PW'] == 'javier'){
            header('location: ./borrar.php?numeroID='.$_REQUEST["numeroID"]);
            exit();
        }
    } else if($_REQUEST["opc"] == "mod") {
        if($_SERVER['PHP_AUTH_USER'] == 'javier' && $_SERVER['PHP_AUTH_PW'] == 'javier' || $_SERVER['PHP_AUTH_USER'] == 'admin' && $_SERVER['PHP_AUTH_PW'] == 'javier') {
            header('location: ./editaBD.php?opc='.$_REQUEST["opc"].'&numeroID='.$_REQUEST["numeroID"]);
            exit();
        }
    } else {
        header('WWW-Authenticate: basic Realm="contenido restringido"');
        header('HTTP/1.0 401 Unathorized');
        echo "No autorizado";
    }
}


?>