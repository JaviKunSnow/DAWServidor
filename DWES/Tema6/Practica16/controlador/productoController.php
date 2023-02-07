<?

if(isset($_REQUEST['borrar'])) {
    $_SESSION['producto'] = $_REQUEST['cod_producto'];
    $producto = ProductoDAO::delete($_SESSION['producto']);
    $lista = ProductoDAO::findAll();
} else if(isset($_REQUEST['editar'])) {
    $_SESSION['accionProducto'] = 'editar';
    $_SESSION['producto'] = $_REQUEST['cod_producto'];
    $producto = ProductoDAO::findById($_SESSION['producto']);
    $_SESSION['vista'] = $vistas['editarProducto'];
} else if(isset($_REQUEST['insertar'])) {
    $_SESSION['accionProducto'] = 'insertar';
    $_SESSION['vista'] = $vistas['editarProducto'];
    require_once './vista/layout.php';
} else {
    $lista = ProductoDAO::findAll();
}

?>