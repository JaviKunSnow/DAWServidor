<main>
    <section>
    <h1>ALBARANES</h1>
    <table class='table table-striped table-light table-responsive align-middle'>
    <tr class='table-dark'>
        <th>id</th>
        <th>Fecha albaran</th>  
        <th>Codigo producto</th>   
        <th>cantidad</th>
        <th>usuario</th>
        <?php
        if(estaValidado() && esAdmin()) {
            echo "<th>Modificar</th>";
            echo "<th>Eliminar</th>";
        }
        echo "</tr>";

        foreach($lista as $value) {
            echo "<tr>";
            echo "<td>" . $value->id_albaran . "</td>";
            echo "<td>" . $value->fechaalb . "</td>";
            echo "<td>" . $value->cod_producto . "</td>";
            echo "<td>" . $value->cantidad . "</td>";
            echo "<td>" . $value->usuario . "</td>";
            if(estaValidado() && esAdmin()) {?>
                <form action="./index.php" method="post">
                    <input type="hidden" name="id_albaran" value="<?
                    echo $value->id_albaran;
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