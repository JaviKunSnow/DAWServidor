<?php 
require "./core/funcionesGenericas.php";
//si se ha pulsado el registro
if(isset($_POST['registro'])){
    $_SESSION['pagina'] = 'registro';
    header('Location: index.php');
    exit();
}
// 
else if (isset($_POST['Enviado'])){
    
    $todoOk = validaSiVacio('nombre','Enviado');
    if($todoOk)
        $todoOk = validaSiVacio('pass','Enviado');

    if($todoOk)
    {

        // Recojo los datos del formulario
        $user = $_POST["nombre"];
        $pass = $_POST["pass"];

        // Se encripta la contraseña ('sha1')
        $pass = sha1($pass);

        // Compruebo si existe el usuario en la BBDD
        $usuario = UsuarioDAO::validaUser($user,$pass);

        if($usuario != null)
        {
            // Guardo los datos del usuario en la sesion
            $_SESSION["validada"] = true;
            $_SESSION["usuario"] = $usuario->usuario;
            $_SESSION["nombre"] = $usuario->nombre;
            $_SESSION["apellidos"] = $usuario->apellidos;
            $_SESSION["email"] = $usuario->email;
            $_SESSION["fecha_nacimiento"] = $usuario->fecha_nacimiento;
            $_SESSION["perfil"] = $usuario->perfil;
            $_SESSION["medias"] = $usuario->medias;
            
            if(isset($_REQUEST['recordarme']))
                {
                    recuerdame();
                }
            // Se accede a la pagina principal de la pagina
            if($_SESSION["perfil"] == "ADM01"){
                $_SESSION["pagina"] = "pista";
                $_SESSION["vista"] = $vistas["pista"];
                header('Location: index.php');
                exit();
            }else{
                $_SESSION["pagina"] = "reserva";
                $_SESSION["vista"] = $vistas["reserva"];
                header('Location: index.php');
                exit();
            }

        }
        else
        {
            $_SESSION["mensaje"] = "No existe el usuario o contraseña";
            $_SESSION["vista"] = $vistas["login"];
            require_once $vistas["layout"];
        }

    }else{

        $_SESSION["mensaje"] = "Debe rellenar los campos";
        $_SESSION["vista"] = $vistas["login"];
        require_once $vistas["layout"];
    }
}
else
{
    //que sea la primera vez que se entra en login
    $_SESSION['vista'] = $vistas['login'];
    require_once $vistas['layout'];
}

?>