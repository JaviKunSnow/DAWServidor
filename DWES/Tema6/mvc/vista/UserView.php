<?php

    if(isset($_SESSION['error'])) {
        echo $_SESSION['error'];
    }

?>
    <form action="./index.php" method="post">
    <div class="mb-3">
      <label for="" class="form-label">Usuario: </label>
      <input type="text" class="form-control" name="user" id="user" aria-describedby="helpId" value="<?php
        echo $usuario->usuario;
      ?>">
      <label for="" class="form-label">Nombre: </label>
      <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" value="<?php
        echo $usuario->nombre;
      ?>">

      <?php
        if($_SESSION['accion'] == "editar") {
      ?>
      <label for="pass" class="form-label">Pass: </label>
      <input type="password" class="form-control" name="pass" id="pass" aria-describedby="helpId" value="<?php
        echo $usuario->clave;
      ?>">
      <label for="passR" class="form-label">Repetir Pass: </label>
      <input type="password" class="form-control" name="passR" id="pass" aria-describedby="helpId">
      <?php
        }
      ?>
      <label for="correo" class="form-label">Correo: </label>
      <input type="text" class="form-control" name="correo" id="correo" aria-describedby="helpId" value="<?php
        echo $usuario->correo;
      ?>">
      <label for="perfil" class="form-label">Perfil: </label>
      <input type="text" class="form-control" name="miperfil" id="miperfil" aria-describedby="helpId" value="<?php
        echo $usuario->perfil;
      ?>">
      <?php
        if($_SESSION['accion'] == "editar") {
            ?>
                <input type="submit" name="guardar" class="btn btn-primary" value="guardar">
            <?php
      } else {
        ?>
            <input type="submit" name="editar" class="btn btn-primary" value="editar">
        <?php
      }
      ?>
    </div>
</form>
