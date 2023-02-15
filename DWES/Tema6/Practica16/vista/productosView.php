<main>
    <section>
    <h1>PRODUCTOS</h1>
    <table class='table table-striped table-light table-responsive align-middle'>
    <tr class='table-dark'>
        <th>Codigo producto</th>
        <th>nombre</th>  
        <th>Descripcion</th>   
        <th>Precio</th>
        <th>Stock</th>
        <?php
        if(estaValidado() && esAdmin()) {
            echo "<th>Modificar</th>";
            echo "<th>Eliminar</th>";
        }
        echo "</tr>";

        foreach($lista as $value) {
            echo "<tr>";
            echo "<td>" . $value->cod_producto . "</td>";
            echo "<td>" . $value->nombre . "</td>";
            echo "<td>" . $value->descripcion . "</td>";
            echo "<td>" . $value->precio . "</td>";
            echo "<td>" . $value->stock . "</td>";
            if(estaValidado()) {
                if(esModerador() || esAdmin()) {?>
                    <form action="./index.php" method="post">
                        <input type="hidden" name="cod_producto" value="<?
                        echo $value->cod_producto;
                        ?>">
                    <td><button type="submit" class='btn btn-warning me-2' name='editar'>Modificar</button></td>
                    <?
                        if(esAdmin()) {?>
                            <td><button type="submit" class='btn btn-warning me-2' name='editar'>Eliminar</button></td>
                        <?
                        }
                    ?>
                    </form>
                <?
                }
                echo "</tr>";
                }
            }
            echo "</table>";
                ?>
            <form action="./index.php" method="post">
                <button type="submit" class='btn btn-warning me-2' name='insertar'>Insertar</button>
            </form>
    </section>
</main>