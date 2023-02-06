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
    <label for="grupo">
        <input type="text" name="grupo" id="grupo">
    </label>
    <label for="fecha">
        <input type="text" name="fecha" id="fecha">
    </label>
    <label for="precio">
        <input type="number" name="precio" id="precio">
    </label>
    <label for="lugar">
        <input type="text" name="lugar" id="lugar">
    </label>
    <input type="submit" value="modificar" name="modificar">
</form>