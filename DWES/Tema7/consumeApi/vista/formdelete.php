<?php

require_once '../peticiones/funciones.php';

?>
<form action="../controlador/ConciertosControlador.php" method="post">
    <select name="id" id="id">ID:
        <option value="0">Selecciona uno</option>
        <?php
            cargarConciertos();
        ?>
    </select>
    <input type="submit" value="borrar" name="borrar">
</form>