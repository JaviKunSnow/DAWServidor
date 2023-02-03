<?php

require("../peticiones/curl.php");

if(isset($_REQUEST['accion'])){
    if($_REQUEST['accion'] == "listar") {
        $lista = get();
        require '../vista/listar.php';
    }
    if(isset($_REQUEST['guardar'])) {

        if(post($_REQUEST['grupo'], $_REQUEST['fecha'], $_REQUEST['precio'], $_REQUEST['lugar'])){
            $lista = get();
            require '../vista/listar.php';
        } else {
            require '../vista/formInsert.php';
        }
    }
}

?>