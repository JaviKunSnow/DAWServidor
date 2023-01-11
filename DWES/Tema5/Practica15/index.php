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
                <img src="img/nike.png" class="bi me-2" width="40" height="32"></img>
            </a>
            <span class="mb-3 mb-md-0 text-light">&copy; 2023 Company, Inc</span>
        </div>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-light" href="#">&#xF344;</a></li>
            <li class="ms-3"><a class="text-light" href="#">&#xF437;</a></li>
            <li class="ms-3"><a class="text-light" href="#">&#xF344;</a></li>
        </ul>
    </footer>
</body>
</html>