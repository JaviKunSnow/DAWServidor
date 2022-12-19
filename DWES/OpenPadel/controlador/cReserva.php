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
//Admin Usuarios
else if(isset($_POST['usuarios'])){
    $lista = UsuarioDAO::findAll();
    $_SESSION['pagina'] = 'usuarios';
    header('Location: index.php');
    exit();
}
// Perfil
else if(isset($_POST['perfil']))
{
    $_SESSION['pagina'] = 'perfil';
    header('Location: index.php');
    exit();

}
//Reservar pista
elseif(isset($_POST['reservarPista']))
{
    $usuario = $_SESSION['usuario'];
    $id = $_REQUEST['id_reserva'];
    ReservaDAO::updateReservado($usuario,$id);

    
    $_SESSION['vista'] = $vistas['reservado'];
    require_once $vistas['layout'];
}
//buscador
elseif(isset($_POST['horas'])|| isset($_POST['fecha'])){
    //Que existe fecha y hora
    if($_POST['horas']!= 0 && $_POST['fecha']!= '')
        $lista = ReservaDAO::getReservaDiaHora($_POST['fecha'],$_POST['horas']);
    //existe fecha
    elseif($_POST['horas']== 0 && $_POST['fecha']!= '')
        $lista = ReservaDAO::getReservaDia($_POST['fecha']);
    //existen horas
    elseif($_POST['horas']!= 0 && $_POST['fecha'] == '')
        $lista = ReservaDAO::getReservaHora($_POST['horas']);
    else
        $lista = ReservaDAO::findAll();
        
    $dias = ReservaDAO::findDias();
    $_SESSION['vista'] = $vistas['reserva'];
    require_once $vistas['layout'];    
}
else{
    $dias = ReservaDAO::findDias();
    $lista = ReservaDAO::findAll();
    $_SESSION['vista'] = $vistas['reserva'];
    require_once $vistas['layout'];
}

?>