<?php

require "./core/funcionesGenericas.php";
//si se ha pulsado login
if (isset($_POST['login'])) {
    $_SESSION['pagina'] = 'login';
    header('Location: index.php');
    exit();
}
// Logout
else if(isset($_POST['logout']))
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

    //no hace falta pasarle la pagina porque no lleva datos
    
    header('Location: index.php');
    exit();
}

//Nueva pista cargar vista
else if(isset($_POST['nuevaPista']))
{
    $_SESSION['vista'] = $vistas['nuevaPista'];
    require_once $vistas['layout'];
}
//guardar la nueva Pista
else if(isset($_POST['crearPista']))
{
    $todoOk = validaSiVacio('nombre_pista','crearPista');

    if($todoOk)
    {
        $nombre_pista = $_REQUEST['nombre_pista'];

        PistaDAO::save($nombre_pista);

        $lista = PistaDAO::findAll();
        $_SESSION['vista'] = $vistas['pista'];
        require_once $vistas['layout'];
    }
    else
    {   
        $_SESSION["mensaje"] = "El campo no puede estar vacio";
        $_SESSION['vista'] = $vistas['nuevaPista'];
        require_once $vistas['layout'];   
    }
}
//modificar usuario cargar mod
else if(isset($_POST['modPista'])){
    $pista = PistaDAO::findById($_POST['id_pista']);
    $_SESSION['vista'] = $vistas['modPista'];
    require_once $vistas['layout'];
}
//eliminar usuario
else if(isset($_POST['eliminarPista'])){
    //ReservaDAO::updateReservado();
    PistaDAO::deleteById($_POST['id_pista']);
    $lista = PistaDAO::findAll();
    $_SESSION['vista'] = $vistas['pista'];
    require_once $vistas['layout'];
}
//Modificar el usuario dentro de modPista
else if(isset($_POST['modificarPista'])){
    $todoOk = validaSiVacio('nombre_pista','modificarPista');
    if($todoOk){
        $id_pista = $_REQUEST['id_pista'];
        $nombre_pista = $_REQUEST['nombre_pista'];
        
        $pista = new Pista($id_pista, $nombre_pista);
        PistaDAO::update($pista);
       
        $lista = PistaDAO::findAll();
        $_SESSION['vista'] = $vistas['pista'];
        require_once $vistas['layout'];
    }else{
        $_SESSION["mensaje"] = "El campo no puede estar vacio";
        $pista = PistaDAO::findById($_POST['id_pista']);
        $_SESSION['vista'] = $vistas['modPista'];
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
//admin Usuarios
else if(isset($_POST['usuarios'])){
    $lista = UsuarioDAO::findAll();
    $_SESSION['pagina'] = 'usuarios';
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
else if($_SESSION['validada']||(isset($_POST['pistas']))){
    $_SESSION['vista'] = $vistas['pista'];
    $lista = PistaDAO::findAll();
    require_once $vistas['layout']; 
}else{
    $_SESSION['vista'] = $vistas['pista'];
    $lista = PistaDAO::findAll();
    require_once $vistas['layout']; 
}

?>
