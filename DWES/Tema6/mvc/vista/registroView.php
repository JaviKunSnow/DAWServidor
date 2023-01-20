<?php

    if(isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }

?>
    <form action="./index.php" method="post">
    <div class="mb-3">
        <label for="" class="form-label">Usuario: </label>
        <input type="text" class="form-control" name="user" id="user" aria-describedby="helpId">
        <label for="" class="form-label">Nombre: </label>
        <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId">
        <label for="pass" class="form-label">Pass: </label>
        <input type="password" class="form-control" name="pass" id="pass" aria-describedby="helpId">
        <label for="passR" class="form-label">Repetir Pass: </label>
        <input type="password" class="form-control" name="passR" id="pass" aria-describedby="helpId">
        <label for="correo" class="form-label">Correo: </label>
        <input type="text" class="form-control" name="correo" id="correo" aria-describedby="helpId">
        <input type="submit" name="guardar" class="btn btn-primary" value="Registro">
    </div>
</form>

