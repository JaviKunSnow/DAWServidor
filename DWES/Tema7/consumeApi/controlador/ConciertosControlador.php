<?php

require("../peticiones/curl.php");

if(isset($_REQUEST['accion'])){
    if($_REQUEST['accion'] == "listar") {
        $lista = get();
        require '../vista/listar.php';
    }
} else if(isset($_REQUEST['guardar'])) {

    if(post($_REQUEST['grupo'], $_REQUEST['fecha'], $_REQUEST['precio'], $_REQUEST['lugar'])){
        $lista = get();
        require '../vista/listar.php';
    } else {
        require '../vista/formInsert.php';
    }
} else if(isset($_REQUEST['modificar'])) {

    if(put($_REQUEST['id'], $_REQUEST['grupo'], $_REQUEST['fecha'], $_REQUEST['precio'], $_REQUEST['lugar'])){
        $lista = get();
        require '../vista/listar.php';
    } else {
        require '../vista/formInsert.php';
    }
} else if(isset($_REQUEST['borrar'])) {

    if(delete($_REQUEST['id'])){
        $lista = get();
        require '../vista/listar.php';
    } else {
        require '../vista/formInsert.php';
    }
} else if(isset($_REQUEST['listarID'])) {
    $lista = getById($_REQUEST['id']);
    require '../vista/listar.php';
    
}


?>