<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/estilos.css">
    <title>login</title>
</head>
<?php

    require('../funciones/conexionBD.php');
    require('../funciones/funcionesBD.php');


?>
<body>
    <header>
        <h1>texteo</h1>
    </header>
    <main>
        <section class="caja2">
        <?php

        if(compTodo()) {
            echo "<h2>Registro completado!</h2>";
            echo "<a href='login.php' class='botones'>Iniciar sesion</a>";
        } else {

        ?>
            <h2>Registro</h2>
            <form action="./registro.php" method="post">
                <p>
                    <label for="user">Usuario: </label>
                    <input type="text" name="user" id="user">
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
                    <input type="text" name="nombre" id="nombre">
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
                    <input type="password" name="pass" id="pass">
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
                    <input type="text" name="email" id="email">
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
                    <input type="text" name="fecha" id="fecha">
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
                <input type="submit" value="enviar" name="enviar">
            </form>
        </section>
        <?php

        }

        ?>
    </main>
</body>
</html>