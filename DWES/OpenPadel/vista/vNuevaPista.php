<h2>Nueva Pista</h2>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <label for="nombre_pista">Nombre de Pista: </label><br>
        <input type="text" name="nombre_pista" id="nombre_pista">
    <br>
    <div style="margin-top: 15px;">
    <input type="submit" name="crearPista" value="Crear" class="btn btn-primary">
    </div>
</form>
