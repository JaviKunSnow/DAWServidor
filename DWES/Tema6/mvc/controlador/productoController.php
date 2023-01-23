<?
if(isset($_REQUEST['cod_producto'])) {
    $_SESSION['producto'] = $_REQUEST['cod_producto'];
    $producto = ProductoDAO::findById($_SESSION['producto']);
} else if(isset($_REQUEST['admProductos'])) {
    $lista = ProductoDAO::findAll();
} else {
    $producto = ProductoDAO::findById($_SESSION['producto']);
}



?>