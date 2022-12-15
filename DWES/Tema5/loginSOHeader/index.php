<?php

if(!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: basic Realm="contenido restringido"');
    header('HTTP/1.0 401 Unathorized');
    echo "No autorizado";

} elseif($_SERVER['PHP_AUTH_USER'] == 'javier' && $_SERVER['PHP_AUTH_PW'] == 'javier') {
    header('location: ./paginaConPermiso.php');
} else {
    header('WWW-Authenticate: basic Realm="contenido restringido"');
    header('HTTP/1.0 401 Unathorized');
    echo "No autorizado";
}


?>