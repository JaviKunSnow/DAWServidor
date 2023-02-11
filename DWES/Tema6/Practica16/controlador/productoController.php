<?

if(isset($_REQUEST['borrar'])) {
    $_SESSION['producto'] = $_REQUEST['cod_producto'];
    $producto = productoDAO::delete($_SESSION['producto']);
    $lista = productoDAO::findAll();
} else if(isset($_REQUEST['editar'])) {
    $_SESSION['producto'] = $_REQUEST['cod_producto'];
    $producto = productoDAO::findById($_SESSION['producto']);
    $_SESSION["accion"] = "editar";
    $_SESSION['vista'] = $vistas('editarProducto');
} else if(isset($_REQUEST['insertar'])) {
    $_SESSION["accion"] = "insertar";
    $_SESSION['vista'] = $vistas('editarProducto');
    $_SESSION['controlador'] = $controladores['editarProducto'];
    
} else {
    $lista = productoDAO::findAll();
}

?>