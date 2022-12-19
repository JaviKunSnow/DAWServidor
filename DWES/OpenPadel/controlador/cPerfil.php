<?php
require "./core/validaPerfil.php";
if(isset($_POST['logout']))
{
    // Cierre de la sesion
    unset($_SESSION['validada']);
    session_destroy();
    //para guardar la sesion si se marco recordarme
    if(isset($_COOKIE['recuerdame']))
    {
        setcookie('recuerdame[0]',$_COOKIE['recuerdame'][0], time()-31536000, "/" );
        setcookie('recuerdame[1]',$_COOKIE['recuerdame'][1], time()-31536000, "/" );
    } 
    
    header('Location: index.php');
    exit();
}
//Pistas
else if(isset($_POST['pistas'])){
    $_SESSION["pagina"] = "pista";
    header("Location: index.php");
}

else if(isset($_POST['reservas'])){
    $lista = ReservaDAO::findAll();
    $_SESSION['pagina'] = 'reserva';
    header('Location: index.php');
    exit();
}
//Admin Usuarios
else if(isset($_POST['usuarios'])){
    $lista = UsuarioDAO::findAll();
    $_SESSION['pagina'] = 'usuarios';
    header('Location: index.php');
    exit();
}
//Modificar usuario
else if(isset($_POST['modificar'])){
    if(validaFormulario()){
        $usu=$_REQUEST['usuario'];
        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellidos'];
        $email=$_REQUEST['email'];
        $fecha=$_REQUEST['fecha'];
        $encrip = sha1($_REQUEST['pass1']);
        $perfil = $_SESSION['perfil'];
        $medias = $_SESSION['medias'];
        
        
        $usuario = new Usuario($usu, $nombre,$apellidos,$encrip, $email,$fecha, $perfil,$medias);
        UsuarioDAO::update($usuario);
        
        $_SESSION["validada"] = true;
        $_SESSION["usuario"] = $usuario->usuario;
        $_SESSION["nombre"] = $usuario->nombre;
        $_SESSION["apellidos"] = $usuario->apellidos;
        $_SESSION["email"] = $usuario->email;
        $_SESSION["fecha_nacimiento"] = $usuario->fecha_nacimiento;
        $_SESSION["perfil"] = $usuario->perfil;
        
        $_SESSION["pagina"] = "reserva";
        header("Location: index.php");
    }else{
        $codUsuario = $_SESSION["usuario"];
        $usuario = UsuarioDAO::findById($codUsuario);
        
        $_SESSION['pagina'] = 'perfil';
        $_SESSION['vista'] = $vistas['perfil'];
        require_once $vistas['layout']; 
    }
}else{
    $arrayErrores = Array();
        $_SESSION["erroresPerfil"] = $arrayErrores;

        $codUsuario = $_SESSION["usuario"];
        $usuario = UsuarioDAO::findById($codUsuario);

        $_SESSION['vista'] = $vistas['perfil'];
        require_once $vistas['layout']; 
}

?>