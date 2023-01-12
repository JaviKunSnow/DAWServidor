<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/carousel.css">
</head>
<?php

    session_start();

    require('./funciones/conexionBD.php');
    require('./funciones/funcionesBD.php');
    try {
        $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname=' .BD,USR,PAS);

        $consulta = $conexion->query('select * from producto');

        $arrayZapa = array();

        while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
            array_push($arrayZapa,$fila);
        }

    } catch(Exception $ex) {
        if ($ex->getCode() == 1049) {
            crearBD();
            header('location: ./index.php');
            exit;
        }
        if ($ex->getCode() == 1045) {
            echo "<span style='color: red;'>El nombre de usuario o la contraseña no es correcto.</span>";
        }
        if ($ex->getCode() == 2002) {
            echo "<span style='color: red;'>Se acabo el tiempo de espera, no hemos podido establecer la conexion.</span>";
            echo $ex->getMessage();
        }
    }

?>
<body class="bg-warning" style="padding-bottom: 70px; padding-top: 70px;">
    <header class="p-3 text-bg-dark fixed-top">
        <section class="container">
            <section class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="img/logo.jpg" class="bi me-2" width="60" height="40"></img>
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
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/foto1.webp" width="100%" height="500">
            <div class="container">
                <div class="carousel-caption text-start">
                    <h1>50% Descuento</h1>
                    <p>Aprovecha las ultimas ofertas de las rebajas de invierno.</p>
                    <p><a class="btn btn-lg btn-warning" href="#">Saber mas</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/foto2.jpg" width="100%" height="100%">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Nike x Lil Nas X</h1>
                    <p>Descubre las "zapatillas de Satan" en esta ultima colaboracion.</p>
                    <p><a class="btn btn-lg btn-warning" href="#">Saber mas</a></p>
                </div>
            </div>
        </div>
            <div class="carousel-item">
                <img src="img/foto3.webp" width="100%" height="100%">
                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1>Nike Air Max 95 olive.</h1>
                        <p>Las nuevas zapatillas perfectas para el otoño.</p>
                        <p><a class="btn btn-lg btn-warning" href="#">Saber mas</a></p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <section class="album py-5">
        <section class="container">
            <section class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3'>
            <?php
                foreach($arrayZapa as $zapas) {
                    if($zapas['stock'] != 0){
                            echo "<section class='col'>";
                                echo "<section class='card shadow-sm'>";
                                    echo "<img src='img/".$zapas['foto']."' width='100%' height='450'>";
                                    echo "<section class='card-body bg-dark'>";
                                        echo "<h3 class='h3 text-light'>".$zapas['nombre']."</h3>";
                                        echo "<p class='card-text text-light'>".$zapas['descripcion']."</p>";
                                        echo "<section class='d-flex justify-content-between align-items-center'>";
                                            echo "<section class='btn-group'>";
                                                if(estaValidado()){
                                                    echo "<a href='php/compra.php?id=".$zapas['cod_producto']."&precio=".$zapas['precio']."' class='btn btn-sm btn-outline-light'>Comprar</a>";
                                                } else {
                                                    echo "<a href='login/login.php' class='btn btn-sm btn-outline-warning'>Comprar</a>";
                                                }
                                            echo "</section>";
                                            echo "<small class='text-light'>".$zapas['precio']."€</small>";
                                        echo "</section>";
                                    echo "</section>";
                                echo "</section>";
                            echo "</section>";
                    }
                }
            ?>
            </section>
        </section>
    </section>
    </main>
    <footer class="d-flex flex-wrap justify-content-between align-items-center p-3 py-3 bg-dark fixed-bottom">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-light text-decoration-none lh-1">
                <img src="img/logo.jpg" class="bi me-2" width="70" height="32"></img>
            </a>
            <span class="mb-3 mb-md-0 text-light">&copy; 2023 Company, Inc</span>
        </div>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3">
                <a class="text-light" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg>
                </a>
            </li>
            <li class="ms-3">
                <a class="text-light" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg>
                </a>
            </li>
            <li class="ms-3">
                <a class="text-light" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                    </svg>
                </a>
            </li>
        </ul>
    </footer>
</body>
</html>