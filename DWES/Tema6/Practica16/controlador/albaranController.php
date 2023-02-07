<?

if(isset($_REQUEST['borrar'])) {
    $_SESSION['albaran'] = $_REQUEST['id_albaran'];
    $producto = albaranDAO::delete($_SESSION['albaran']);
    $lista = albaranDAO::findAll();
} else if(isset($_REQUEST['editar'])) {
    $_SESSION['albaran'] = $_REQUEST['id_albaran'];
    $producto = albaranDAO::findById($_SESSION['albaran']);
    $_SESSION['vista'] = $vistas('editarAlbaran');
} else if(isset($_REQUEST['id_albaran'])) {
    $_SESSION['albaran'] = $_REQUEST['id_albaran'];
    $producto = albaranDAO::findById($_SESSION['albaran']);
    $_SESSION['vista'] = $vistas('albaran');
} else {
    $lista = albaranDAO::findAll();
}

?>