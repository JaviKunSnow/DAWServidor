<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/estilos.css">
    <title>Perfil</title>
</head>
<?php

    require('../funciones/conexionBD.php');
    require('../funciones/funcionesBD.php');


?>
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
        <?php

        if(compTodo()) {
            actualizarUsuario();
            session_destroy();
            validaUser($_REQUEST["user"], $_REQUEST["pass"]);
            session_start();
            echo "<section class='caja'>";
                echo "<h2>Perfil actualizado!</h2>";
                echo "<a href='../index.php' class='botones'>Volver a inicio</a>";
            echo "</section>";
        } else {

        ?>
            <h2>Perfil</h2>
            <form action="./registro.php" method="post">
                <p>
                    <label for="user">Usuario: </label>
                    <input type="text" name="user" id="user" readonly="readonly" value="<?php
                    if (!enviado() && vacio("user")) {
                        echo $_SESSION["user"];
                    }
                    ?>">
                    <?php

                    if(enviado()) {
                        if(vacio("user")){
                            echo "<span style='color: red;'><-- Rellene el nombre de usuario</span>";
                        }
                    }

                    ?>
                </p>
                <p>
                    <label for="user">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" value="<?php
                    if (!enviado() && vacio("nombre")) {
                        echo $_SESSION["nombre"];
                    }
                    ?>">
                    <?php

                    if(enviado()) {
                        if(vacio("nombre")){
                            echo "<span style='color: red;'><-- Rellene el nombre</span>";
                        }
                    }

                    ?>
                </p>
                <p>
                    <label for="pass">Contraseña: </label>
                    <input type="password" name="pass" id="pass" value="<?php
                    if (!enviado() && vacio("pass")) {
                        echo $_SESSION["pass"];
                    }
                    ?>">
                    <?php

                    if(enviado()) {
                        if(vacio("user")){
                            echo "<span style='color: red;'><-- Rellene la contraseña</span>";
                        } else if(!compPass("pass")) {
                            echo "<span style='color: red;'><-- La contraseña no cumple los requisitos</span>";
                        }
                    }

                    ?>
                </p>
                <p>
                    <label for="email">Correo Electronico: </label>
                    <input type="text" name="email" id="email" value="<?php
                    if (!enviado() && vacio("mail")) {
                        echo $_SESSION["mail"];
                    }
                    ?>">
                    <?php

                    if(enviado()) {
                        if(vacio("email")){
                            echo "<span style='color: red;'><-- Rellene el correo electronico</span>";
                        } else if(!compMail("email")) {
                            echo "<span style='color: red;'><-- El correo electronico no cumple los requisitos</span>";
                        }
                    }

                    ?>
                </p>
                <p>
                    <label for="fecha">Fecha: </label>
                    <input type="text" name="fecha" id="fecha" value="<?php
                    if (!enviado() && vacio("fecha")) {
                        echo $_SESSION["fecha"];
                    }
                    ?>">
                    <?php

                    if(enviado()) {
                        if(vacio("fecha")){
                            echo "<span style='color: red;'><-- Rellene la fecha</span>";
                        } else if(!compFecha("fecha")) {
                            echo "<span style='color: red;'><-- La fecha no es correcta</span>";
                        }
                    }

                    ?>
                </p>
                <p>
                    <label for="selector">Elige una opción</label>
                    <select name="perfil" id="selector">
                        <option value="0">Seleccione una opción</option>
                        <option value="ADM">Administrador</option>
                        <option value="MOD">Moderador</option>
                        <option value="NOR">Usuario normal</option>
                    </select>
                    <?php
                    if(existe("perfil") && $_REQUEST["perfil"] == 0){
                        echo "<span style='color: red;'><-- La fecha no es correcta</span>";
                    }
            ?>
                </p>
                <input type="submit" value="enviar" name="guardar cambios">
            </form>
        </section>
        <?php

        }

        ?>
    </main>
</body>
</html>