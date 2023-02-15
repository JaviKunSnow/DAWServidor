<main>
    <section>
    <h1>VENTA</h1>
    <table class='table table-striped table-light table-responsive align-middle'>
    <tr class='table-dark'>
        <th>id</th>
        <th>Usuario</th>  
        <th>Fecha compra</th>   
        <th>Codigo producto</th>
        <th>Cantidad</th>
        <th>Precio total</th>
        <?php
        if(estaValidado() && esAdmin()) {
            echo "<th>Modificar</th>";
            echo "<th>Eliminar</th>";
        }
        echo "</tr>";

        foreach($lista as $value) {
            echo "<tr>";
            echo "<td>" . $value->id_venta . "</td>";
            echo "<td>" . $value->usuario . "</td>";
            echo "<td>" . $value->fechacomp . "</td>";
            echo "<td>" . $value->cod_producto . "</td>";
            echo "<td>" . $value->cantidad . "</td>";
            echo "<td>" . $value->precio_total . "</td>";
            if(estaValidado() && esAdmin()) {?>
                <form action="./index.php" method="post">
                    <input type="hidden" name="id_venta" value="<?
                    echo $value->id_venta;
                    ?>">
                    <td><button type="submit" class='btn btn-warning me-2' name='editar'>Eliminar</button></td>
                </form>
            <?
            }
            echo "</tr>";
            }
        echo "</table>";
            ?>
    </section>
</main>