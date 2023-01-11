<?php

require("../funciones/conexionBD.php");
require("../funciones/funcionesBD.php");
require("../funciones/tablasBD.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Leer tabla</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/carousel.css">
</head>
<body class="bg-warning" style="padding-bottom: 70px; padding-top: 70px;">
    <header class="p-3 text-bg-dark fixed-top">
        <section class="container">
            <section class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="img/nike.png" class="bi me-2" width="40" height="32"></img>
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-warning">Inicio</a></li>
                    <li><a href="tienda.php" class="nav-link px-2 text-white">Tienda</a></li>
                    <?php
                        if(estaValidado()){
                            echo "<li><a href='php/perfil.php' class='nav-link px-2 text-white'>Perfil</a></li>";
                            if(esModerador() || esAdmin()) {
                                echo "<li><a href='php/leerBD.php?tabla=producto' class='nav-link px-2 text-white'>Productos</a></li>";
                                echo "<li><a href='php/leerBD.php?tabla=ventas' class='nav-link px-2 text-white'>Ventas</a></li>";
                                echo "<li><a href='php/leerBD.php?tabla=albaranes' class='nav-link px-2 text-white'>Albaranes</a></li>";
                            }
                        }
                    ?>
                    <li><a href="#" class="nav-link px-2 text-white">Contacto</a></li>
                </ul>
                <section class="text-end">
                    <?php
                        if(estaValidado()){
                            echo "<a href='#' class='btn btn-outline-light me-2'>".$_SESSION['user']."</a>";
                            echo "<a href='login/logout.php' class='btn btn-warning'>Cerrar Sesion</a>";
                        } else {
                            echo "<a href='login/login.php' class='btn btn-outline-light me-2'>Iniciar Sesion</a>";
                            echo "<a href='login/registro.php' class='btn btn-warning'>Registro</a>";
                        }
                    ?>
                </section>
            </section>
        </section>
    </header>
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
</body>
</html>