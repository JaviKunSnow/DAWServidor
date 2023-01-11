<?php

require('../funciones/conexionBD.php');
require('../funciones/funcionesBD.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/signin.css">
    <title>login</title>
</head>
<body class="bg-warning">
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
                            echo "<li><a href='php/perfil.php'>Perfil</a></li>";
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
    <main class="form-signin w-100 m-auto text-center">
            <form action="../funciones/validarBD.php" method="post">
                <img class="mb-4" src="../img/nike.png" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Iniciar Sesion</h1>
                <section class="form-floating">
                    <input type="text" class="form-control" name="user" id="user" placeholder="name@example.com">
                    <label for="user">Usuario</label>
                </section>
                <section class="form-floating">
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                    <label for="pass">Contraseña</label>
                </section>
                <button class="w-100 btn btn-lg btn-dark text-white" type="enviar">Iniciar sesion</button>
                <p class="mt-5 mb-3 text-dark">&copy; 2023</p>
            </form>
    </main>
    <footer class="d-flex flex-wrap justify-content-between align-items-center p-3 py-3 bg-dark fixed-bottom">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-light text-decoration-none lh-1">
                <img src="img/nike.png" class="bi me-2" width="40" height="32"></img>
            </a>
            <span class="mb-3 mb-md-0 text-light">&copy; 2023 Company, Inc</span>
        </div>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="btn text-" href="#"><i class="fab fa-instagram-f"></i></a></li>
            <li class="ms-3"><a class="btn" href="#"><i class="fab fa-twitter"></i></a></li>
            <li class="ms-3"><a class="text-light" href="#"><i class="fab fa-facebook"></i></a></li>
        </ul>
    </footer>
</body>
</html>