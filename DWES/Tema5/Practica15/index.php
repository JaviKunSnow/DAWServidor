<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/estilos.css">
    <title>Inicio</title>
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

<body>
    <header>
        <section>
            <img src="img/nike.png" alt="logo" width="100px" height="50px">
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
            <?php

                foreach($arrayZapa as $zapas) {
                    if($zapas['stock'] != 0){
                        echo "<section class='caja'>";
                            echo "<img src='img/".$zapas['foto']."' width='200px' height='200px'>";
                            echo "<h2>". $zapas['nombre'] ."</h2>";
                            echo "<p>". $zapas['descripcion'] ."</p>";
                            echo "<p>Precio: ". $zapas['precio'] ."</p>";
                            echo "<a href='php/compra.php?id=".$zapas['cod_producto']."&precio=".$zapas['precio']."' class='botones'>Comprar</a>";
                        echo "</section>";
                    }
                }

            ?>
    </main>
    <footer>
        <section>
            <img src="img/nike.png" alt="logo" width="100px" height="50px">
        </section>
        <section>
            
        </section>
        <section>
            
        </section>
    </footer>
</body>
</html>