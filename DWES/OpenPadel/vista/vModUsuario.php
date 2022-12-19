<h2>Modificar usuario</h2>

<div class="formulario">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <label for="usuario">Usuario:  </label><br>
        <input type="text" name="usuario" id="usuario" placeholder="Nombre de Usuario" readonly value="<?php echo $usuario->usuario;?>">
        
        <input type="hidden" name="usuario" id="usuario" value="<?php echo $usuario->usuario;?>">
        <?php incompleto('usuario')?>
       
        <br>
        <label for="nombre">Nombre: </label><br>
            <input type="text" name="nombre" id="nombre" value="<?php echo $usuario->nombre;?>" >
        <br>
        <label for="apellidos">Apellidos: </label><br>
            <input type="text" name="apellidos" id="apellidos" value="<?php echo $usuario->apellidos;?>" >
        <br>
        <label for="fecha">Fecha de nacimiento:(aaaa-mm-dd) </label><br>
            <input type="text" name="fecha" id="fecha" value="<?php echo $usuario->fecha_nacimiento;?>">
            <?php incompleto('fecha')?>
        <br>
        <label for="email">Email: </label><br>
            <input type="email" name="email" id="email" value='<?php echo $usuario->email;?>'>
            <?php incompleto('email')?>
        <br>
       
        <label for="pass1">Contraseña: </label><br>
            <input type="password" name="pass1" id="pass1" placeholder="Contraseña" >
            <p>El formato de la contraseña debe tener mínimo 8 caracteres, una mayúscula, una minúscula y un numero </p>
        
        <label for="pass2">Repita contraseña: </label><br>
            <input type="password" name="pass2" id="pass2" placeholder="Repita contraseña"  >
            <?php incompleto('pass1')?>
        <br>
        <label for="perfil">Debe ser (ADM01,U0001):</label><br> 
            <select name="perfil" id="perfil">
                <option value="ADM01" <?php if($usuario->perfil == "ADM01") echo "selected"?>>Administrador</option>
                <option value="U0001" <?php if($usuario->perfil == "U0001") echo "selected"?>>Usuario</option>
            </select>
            <?php incompleto('perfil')?>
        <br>
        <div style="margin: 15px 0;">
        <input type="submit" name="modificarUsu" value="Modificar" class="btn btn-primary">
        <input type="hidden" name="cod_usuario" value="<?php echo $usuario->usuario ?>">
        </div>
</form>
