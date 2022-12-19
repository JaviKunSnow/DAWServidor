<h2>Modificar Pista</h2>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <label for="id_pista">ID de Pista: </label><br>
        <input type="text" name="id_pista" id="id_pista" readonly value="<?php echo $pista->id_pista;?>">
    
    <br>
    <label for="nombre_pista">Nombre de Pista: </label><br>
        <input type="text" name="nombre_pista" id="nombre_pista" value="<?php echo $pista->nombre_pista;?>">
    <br>
    <div style="margin-top: 15px;">
    <input type="submit" name="modificarPista" value="Modificar pista" class="btn btn-primary">
    </div>
</form>
