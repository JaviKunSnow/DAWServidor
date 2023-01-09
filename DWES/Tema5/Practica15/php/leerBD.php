<?php

require("../funciones/conexionBD.php");
require("../funciones/funcionesBD.php");
require("../funciones/tablasBD.php");
require("../funciones/validarBD.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Leer tabla</title>
    <link rel="stylesheet" href="../style/estilos.css">
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
        <section>
            <?php

                if($_REQUEST["tabla"] == "producto") {
                    tablaProducto();
                } else if($_REQUEST["tabla"] == "ventas") {
                    tablaVentas();
                } else if($_REQUEST["tabla"] == "albaranes") {
                    tablaAlbaranes();
                }

            ?>
        </section>
    </main>
        <div class="cajalink2">
            <a href="editaBD.php?opc=ins">
                <p>Insertar datos</p>
            </a>
        </div>
        <br>
        <br>
        <h2>Ver codigo:</h2>
        <div class="cajalink2">
            <a href="verCodigo.php?valor=eligeFichero.php">
                <p>Ver codigo eligeFichero</p>
            </a>
        </div>
        <div class="cajalink2">
            <a href="verCodigo.php?valor=editaFichero.php">
                <p>Ver codigo editaFichero</p>
            </a>
        </div>
</body>
</html>