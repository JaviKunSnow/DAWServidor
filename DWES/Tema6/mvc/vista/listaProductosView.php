
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th>Cod.Producto</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Ver</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($lista as $value) {
                    ?>
                        <tr class="">
                            <td scope="row"><?echo $value->cod_producto?></td>
                            <td scope="row"><?echo $value->nombre?></td>
                            <td scope="row"><?echo $value->descripcion?></td>
                            <td scope="row"><?echo $value->precio?></td>
                            <td scope="row"><?echo $value->stock?></td>
                            <form action="./index.php" method="post">
                                <input type="hidden" name="cod_producto">
                                <td><input type="submit" name="verProducto" value="Ver"></td>
                                <td><input type="submit" name="editarProducto" value="Editar"></td>
                                <td><input type="submit" name="borrarProducto" value="Borrar"></td>
                            </form>
                        </tr>
                    <?
                }
            ?>
        </tbody>
    </table>
    <form action="./index.php" method="post">
        <input type="submit" name="nuevoP" value="Nuevo producto">
    </form>
</div>
