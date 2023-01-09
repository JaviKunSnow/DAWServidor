<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/estilos.css">
    <title>login</title>
</head>
<body>
    <header>
        <section>
            <img src="../img/nike.png" alt="logo" width="100px" height="50px">
        </section>
        <section class="login">
            <?php
                if(estaValidado()){
                    echo "<a href='#' class='botones'>".$_SESSION['nombre']."</a>";
                    echo "<a href='login/logout.php' class='botones'>Cerrar Sesion</a>";
                } else {
                    echo "<a href='login/login.php' class='botones'>Iniciar Sesion</a>";
                    echo "<a href='login/registro.php' class='botones'>Registro</a>";
                }
            ?>
        </section>
    </header>
    <nav>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="paginas/perfil.php">Perfil</a></li>
            <?php
                if(estaValidado()){
                    if(esModerador() || esAdmin()) {
                        echo "<a href='php/leerBD.php?tabla=producto' class='botones'>Productos</a>";
                        echo "<a href='php/leerBD.php?tabla=ventas' class='botones'>Ventas</a>";
                        echo "<a href='php/leerBD.php?tabla=albaranes' class='botones'>Albaranes</a>";
                    }
                }
            ?>
            <li><a href="#">Contacto</a></li>
        </ul>
    </nav>
    <main>
        <section class="caja2">
            <h2>Inicio sesion</h2>
            <form action="../funciones/validarBD.php" method="post">
                <p>
                    <label for="user">Usuario: </label>
                    <input type="text" name="user" id="user">
                </p>
                <p>
                    <label for="pass">Contraseña: </label>
                    <input type="password" name="pass" id="pass">
                </p>
                <input type="submit" value="enviar" name="enviar">
            </form>
        </section>
    </main>
</body>
</html>