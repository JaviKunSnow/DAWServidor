<?
if(isset($_REQUEST['borrar'])) {
    $_SESSION['producto'] = $_REQUEST['cod_producto'];
    $producto = ProductoDAO::delete($_SESSION['producto']);
    $lista = ProductoDAO::findAll();
} else if(isset($_REQUEST['editar'])) {
    $_SESSION['producto'] = $_REQUEST['cod_producto'];
    $producto = ProductoDAO::findById($_SESSION['producto']);
    $_SESSION['vista'] = $vistas('editarProducto');
} else if(isset($_REQUEST['cod_producto'])) {
    $_SESSION['producto'] = $_REQUEST['cod_producto'];
    $producto = ProductoDAO::findById($_SESSION['producto']);
    $_SESSION['vista'] = $vistas('producto');
} else if(isset($_REQUEST['admProductos'])) {
    $lista = ProductoDAO::findAll();
}

?>