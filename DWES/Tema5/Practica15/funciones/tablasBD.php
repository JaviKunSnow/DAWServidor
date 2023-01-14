<?php

function tablaVentas() {
    echo "<h1>VENTA</h1>";
    echo "<table class='table table-striped table-light table-responsive align-middle' border='1'>";
    echo "<tr class='table-dark'>";
        echo "<th>id</th>";
        echo "<th>Usuario</th>";   
        echo "<th>Fecha compra</th>";    
        echo "<th>Codigo producto</th>";
        echo "<th>Cantidad</th>";
        echo "<th>Precio total</th>";
        if(estaValidado() && esAdmin()) {
            echo "<th>Modificar</th>";
            echo "<th>Eliminar</th>";
        }
        echo "</tr>";
        try {
            $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname='.BD, USR, PAS);
            $sql = 'select * from ventas';

            $resultado= $conexion->query($sql);

            while ($fila = $resultado->fetch(PDO::FETCH_BOTH)) {
                echo "<tr>";
                echo "<td>" . $fila["id_venta"] . "</td>";
                echo "<td>" . $fila["usuario"] . "</td>";
                echo "<td>" . $fila["fechacomp"] . "</td>";
                echo "<td>" . $fila["cod_producto"] . "</td>";
                echo "<td>" . $fila["cantidad"] . "</td>";
                echo "<td>" . $fila["precio_total"] . "</td>";
                if(estaValidado() && esAdmin()) {
                    echo "<td><a class='btn btn-warning me-2' href='./editaBD.php?opc=mod&numeroID=" . $fila["id_venta"] . "'>Modificar</a></td>";
                    echo "<td><a class='btn btn-warning me-2' href='./editaBD.php?opc=elm&numeroID=" . $fila["id_venta"] . "'>Borrar</a></td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            echo "<br>";
            echo "<a class='btn btn-dark ml-2' href='./editaBD.php?opc=ins&tabla=".$_REQUEST["tabla"]."'>Insertar</a>";

        } catch (Exception $ex) {
            if ($ex->getCode() == 1049) {
                echo "<span style='color: red;'>La base de datos no existe.</span>";
            }
            if ($ex->getCode() == 1045) {
                echo "<span style='color: red;'>El nombre de usuario o la contraseña no es correcto.</span>";
            }
            if ($ex->getCode() == 2002) {
                echo "<span style='color: red;'>Se acabo el tiempo de espera, no hemos podido establecer la conexion.</span>";
            }
        }
}

function tablaAlbaranes() {
    echo "<h1>ALBARANES</h1>";
    echo "<table class='table table-striped table-light table-responsive align-middle' border='1'>";
    echo "<tr class='table-dark'>";
        echo "<th>ID</th>";
        echo "<th>Fecha albaran</th>";   
        echo "<th>Codigo producto</th>";    
        echo "<th>Cantidad</th>";
        echo "<th>Usuario</th>";
        if(estaValidado() && esAdmin()) {
            echo "<th>Modificar</th>";
            echo "<th>Eliminar</th>";
        }
        echo "</tr>";
        try {
            $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname='.BD, USR, PAS);
            $sql = 'select * from albaranes';

            $resultado= $conexion->query($sql);

            while ($fila = $resultado->fetch(PDO::FETCH_BOTH)) {
                echo "<tr>";
                echo "<td>" . $fila["id_albaran"] . "</td>";
                echo "<td>" . $fila["fechaalb"] . "</td>";
                echo "<td>" . $fila["cod_producto"] . "</td>";
                echo "<td>" . $fila["cantidad"] . "</td>";
                echo "<td>" . $fila["usuario"] . "</td>";
                if(estaValidado() && esAdmin()) {
                    echo "<td><a class='btn btn-warning me-2' href='./editaBD.php?opc=mod&numeroID=" . $fila["id_albaran"] . "'>Modificar</a></td>";
                    echo "<td><a class='btn btn-warning me-2' href='./editaBD.php?opc=elm&numeroID=" . $fila["id_albaran"] . "'>Borrar</a></td>";
                }
                echo "</tr>";
            }
            echo "</table>";

        } catch (Exception $ex) {
            if ($ex->getCode() == 1049) {
                echo "<span style='color: red;'>La base de datos no existe.</span>";
            }
            if ($ex->getCode() == 1045) {
                echo "<span style='color: red;'>El nombre de usuario o la contraseña no es correcto.</span>";
            }
            if ($ex->getCode() == 2002) {
                echo "<span style='color: red;'>Se acabo el tiempo de espera, no hemos podido establecer la conexion.</span>";
            }
        }
}

function tablaProducto() {
    echo "<h1>PRODUCTOS</h1>";
    echo "<table class='table table-striped table-light table-responsive align-middle' border='1'>";
    echo "<tr class='table-dark'>";
        echo "<th>codigo producto</th>";
        echo "<th>nombre</th>";   
        echo "<th>Descripcion</th>";    
        echo "<th>Precio</th>";
        echo "<th>Stock</th>";
        if(estaValidado() && esAdmin()) {
            echo "<th>Modificar</th>";
            echo "<th>Eliminar</th>";
        }
        echo "</tr>";
        try {
            $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname='.BD, USR, PAS);
            $sql = 'select * from producto';

            $resultado= $conexion->query($sql);

            while ($fila = $resultado->fetch(PDO::FETCH_BOTH)) {
                echo "<tr>";
                echo "<td>" . $fila["cod_producto"] . "</td>";
                echo "<td>" . $fila["nombre"] . "</td>";
                echo "<td>" . $fila["descripcion"] . "</td>";
                echo "<td>" . $fila["precio"] . "</td>";
                echo "<td>" . $fila["stock"] . "</td>";
                if(estaValidado() && esAdmin()) {
                    echo "<td><input type='number' name='num' id='num'>";
                    echo "<a class='btn btn-warning me-2' href='./editaBD.php?opc=add&numeroID=" . $fila["cod_producto"] . "&numero=num'>Añadir</a>";
                    echo "</td>";
                    echo "<td><a class='btn btn-warning me-2' href='./editaBD.php?opc=mod&numeroID=" . $fila["cod_producto"] . "'>Modificar</a></td>";
                }
                echo "</tr>";
            }
            echo "</table>";

        } catch (Exception $ex) {
            if ($ex->getCode() == 1049) {
                echo "<span style='color: red;'>La base de datos no existe.</span>";
            }
            if ($ex->getCode() == 1045) {
                echo "<span style='color: red;'>El nombre de usuario o la contraseña no es correcto.</span>";
            }
            if ($ex->getCode() == 2002) {
                echo "<span style='color: red;'>Se acabo el tiempo de espera, no hemos podido establecer la conexion.</span>";
            }
        }
}

?>