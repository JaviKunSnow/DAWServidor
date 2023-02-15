<?

if(isset($_REQUEST['borrar'])) {
    $_SESSION['producto'] = $_REQUEST['cod_producto'];
    $producto = productoDAO::delete($_SESSION['producto']);
    $lista = productoDAO::findAll();
} else if(isset($_REQUEST['editar'])) {
    $_SESSION['producto'] = $_REQUEST['cod_producto'];
    $_SESSION["accionProducto"] = "editar";
    $_SESSION['pagina'] = "editar";
    $_SESSION['controlador'] = $controladores['editarProducto'];
    $_SESSION['vista'] = $vistas['editarProducto'];
    require_once $_SESSION['controlador'];
} else if(isset($_REQUEST['insertar'])) {
    $_SESSION["accionProducto"] = "insertar";
    $_SESSION['vista'] = $vistas['editarProducto'];
    $_SESSION['pagina'] = "editar";
    $_SESSION['controlador'] = $controladores['editarProducto'];
    require_once $_SESSION['controlador'];
    
} else {
    $lista = productoDAO::findAll();
}

?>