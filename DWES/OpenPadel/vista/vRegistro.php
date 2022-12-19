<h2>Registro de nuevo Usuario</h2>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <label for="usuario">Usuario: </label>
    <br > 
        <input type="text" name="usuario" id="usuario" placeholder="Nombre de Usuario" value="<?php rellenaUsuario()?>">
        <?php incompleto('usuario')?>
    
    <br>
    <label for="nombre">Nombre: </label>
    <br>
        <input type="text" name="nombre" id="nombre" value="<?php rellenaNombre()?>" >
        <?php incompleto('nombre')?>
    
    <br>
    <label for="apellidos">Apellidos: </label>
    <br>
        <input type="text" name="apellidos" id="apellidos" value="<?php rellenaApellidos()?>" >
        <?php incompleto('apellidos')?>
    
    <br>
    <label for="fecha">Fecha de nacimiento:(aaaa-mm-dd) </label>
    <br>
        <input type="text" name="fecha" id="fecha" value="<?php rellenaFecha('fecha')?>">
        <?php incompleto('fecha')?>
    
    <br>
    <label for="email">Email: </label>
    <br>
        <input type="email" name="email" id="email" value='<?php rellenaEmail()?>'>
        <?php incompleto('email')?>
    <br>
    <label for="pass1">Contraseña: </label>
    <br>
        <input type="password" name="pass1" id="pass1" placeholder="Contraseña" >
        <p class="detalle">El formato de la contraseña debe ser mínimo 8 caracteres, una mayúscula, una minúscula y un numero </p>
    
    <label for="pass2">Repita contraseña: </label>
    <br>
        <input type="password" name="pass2" id="pass2" placeholder="Repita contraseña">
        <?php incompleto('pass1')?>
    
    <br>
    <div style="margin-top: 10px;">
    <input type="submit" name="Enviado" value="Registrar" class="btn btn-primary">
    <input type="submit" value="Volver" name="volver" class="btn btn-primary">
    </div>
</form>