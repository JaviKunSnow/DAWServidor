<?php
if(isset($_COOKIE['recuerdame']))
{
    $user=$_COOKIE['recuerdame'][0];
    $pass=$_COOKIE['recuerdame'][1];

    $usuario = UsuarioDAO::validaUser($user, $pass);

    if($usuario != null)
    { 
                       
        $_SESSION["validada"] = true;
        $_SESSION["usuario"] = $usuario->usuario;
        $_SESSION["nombre"] = $usuario->nombre;
        $_SESSION["apellidos"] = $usuario->apellidos;
        $_SESSION["email"] = $usuario->email;
        $_SESSION["fecha_nacimiento"] = $usuario->fecha_nacimiento;
        $_SESSION["perfil"] = $usuario->perfil;
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Padel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./webroot/css/style.css">
</head>

<body>
    <header>
    <div class="pagina">
        <h2>Open Padel</h2>
    </div>
    <div class="navbar">
    
        <?php

        // Si la sesion esta validada
        if (isset($_SESSION['validada'])) {
            echo "<div style='padding-left:30px;'>" . $_SESSION["nombre"] . "</div>";

            // Y eres usuario administrador
            if($_SESSION["perfil"] == "ADM01"){
                ?>

                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="submit" value="Admi usuario" name="usuarios" class="btn btn-dark">
                    <input type="submit" value="Admi pistas" name="pistas" class="btn btn-dark">
                </form>

                <?php
            }
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" style="margin-right: 20px;">
                
                <input type="submit" value="Reserva" name="reservas" class="btn btn-primary">
                <input type="submit" value="Perfil" name="perfil" class="btn btn-primary">
                <input type="submit" value="Logout" name="logout" class="btn btn-primary">
            </form>
        <?php
        } 

        ?>
    </div>
    </header>
    <main class="container">
        <div class="row">
            <?php
            //si hay alguna vista cargada desde
            // el controlador la cargar
            if (!isset($_SESSION['vista']))
                require_once $vistas['login'];
            else { //sino se va siempre al inicio
                require_once $_SESSION['vista'];
            }
            ?>
        </div>
    </main>
    <footer>
        <div class="contFooter">
            <div class="contenidofot1">
                <p>&copy; 2022 Company, openPadel All rights reserved.</p>
            </div>
            <div class="contenidofot2">
                <ul class="list-unstyled d-flex" >
                    <li class="ms-3">openpadel@open.com</li>
                    <li class="ms-3">956432456</li>
                </ul>
            </div>
        </div>
    </footer>

</body>
</html>