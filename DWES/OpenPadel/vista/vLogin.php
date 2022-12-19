<?php
    if(isset($_SESSION["mensaje"]))
    {
        echo $_SESSION["mensaje"];
    }
?>
<div class="inicio">
    <div class="imagenes">
        <img src="./webroot/img/padelInicio.jpg" class="img-fluid">
    </div>
    <div class="form">
        <h2>Login</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <label for="">Inicio Sesion</label>
            <br>
            
                <input type="text" name="nombre" id="nombre" placeholder="Usuario" style="margin: 10px 0;">
            
            <br>
            
                <input type="password" name="pass" id="pass" placeholder="Contraseña" style="margin: 10px 0;">
            
            <br>
            <label for="recordarme">Recordarme<input type="checkbox" name="recordarme" id="recordarme" style="margin-left: 5px;;"></label>
            <br>
            <div style="margin-top: 10px;">
            <input type="submit" value="Iniciar Sesión" name="Enviado" class="btn btn-primary">
            <input type="submit" value="Registro" name="registro" class="btn btn-primary">
            </div>
            
        </form>
    </div>
    
</div>
<?php
    if(isset($_SESSION["mensaje"]))
    {
        unset($_SESSION["mensaje"]);
    }
?>