<?php
require "./core/funcionesAdmiUsuarios.php";

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
else if(isset($_POST['modificarUsu'])){
    if(validaFormulario()){
        $usu=$_REQUEST['usuario'];
        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellidos'];
        $email=$_REQUEST['email'];
        $fecha=$_REQUEST['fecha'];
        $encrip = sha1($_REQUEST['pass1']);
        $perfil = $_REQUEST['perfil'];
        $medias = $_SESSION['medias'];
        
        $usuario = new Usuario($usu,$nombre, $apellidos, $encrip, $email,$fecha, $perfil ,$medias);
        UsuarioDAO::update($usuario);
       
        $lista = UsuarioDAO::findAll();
        $_SESSION['vista'] = $vistas['usuarios'];
        require_once $vistas['layout'];
    }else{
        $usuario = UsuarioDAO::findById($_POST['cod_usuario']);
        $_SESSION['vista'] = $vistas['modUsuarios'];
        require_once $vistas['layout'];
    }
}

// Perfil
else if(isset($_POST['perfil']))
{
    $_SESSION['pagina'] = 'perfil';
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
//modificar usuario
else if(isset($_POST['modUsuario'])){
    $usuario = UsuarioDAO::findById($_POST['cod_usuario']);
    $_SESSION['vista'] = $vistas['modUsuarios'];
    require_once $vistas['layout'];
}
//eliminar usuario
else if(isset($_POST['eliminarUsuario'])){
    UsuarioDAO::deleteById($_POST['cod_usuario']);
    $lista = UsuarioDAO::findAll();
    $_SESSION['vista'] = $vistas['usuarios'];
    require_once $vistas['layout'];
}
//Pistas
else if((isset($_POST['pistas']))){
    $lista = PistaDAO::findAll();
    $_SESSION['pagina'] = 'pista';
    header('Location: index.php');
    exit();
}
//Reservas
else if(isset($_POST['reservas'])){
    $lista = ReservaDAO::findAll();
    $_SESSION['pagina'] = 'reserva';
    header('Location: index.php');
    exit();
}
else{

    $lista = UsuarioDAO::findAll();
    $_SESSION['vista'] = $vistas['usuarios'];
    require_once $vistas['layout'];
}
?>