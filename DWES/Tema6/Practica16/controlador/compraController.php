<?php

if(isset($_REQUEST["comprado"])) {
    ProductoDAO::buy($_REQUEST["cod_producto"], $_REQUEST["stock"]);
    
} else {
    $producto = ProductoDAO::findById($_SESSION['producto']);
}

?>