<form action="./index.php" method="post">
    <section>
        <label for="user">Usuario: </label>
        <input type="text" name="user" id="user" placeholder="<?
            if(isset($_COOKIE["usuario"])) {
                echo $_COOKIE["usuario"];
            }
        ?>">
    </section>
    <section>
        <label for="pass">Contraseña: </label>
        <input type="text" name="pass" id="pass">
    </section>
    <section>
        <input type="checkbox" name="recuerda" id="recuerda">
        <label for="recuerda">Recuerdame</label>
    </section>
    <input type="submit" name="enviar" value="Iniciar sesion">
</form>