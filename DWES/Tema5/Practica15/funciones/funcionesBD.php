<?php

// sesiones

function estaValidado() {
    if(isset($_SESSION["validado"])){
        return true;
    }
    return false;
}

function esAdmin() {
    if(isset($_SESSION["perfil"])){
        if($_SESSION["perfil"] == "ADM") {
            return true;
        }
    }
    return false;
}

function esModerador() {
    if(isset($_SESSION["perfil"])){
        if($_SESSION["perfil"] == "MOD") {
            return true;
        }
    }
    return false;
}


function enviado(){
    if(isset($_REQUEST["enviar"])){
        return true;
    }
    return false;
}

function enviadoGuardar(){
    if(isset($_REQUEST["guardar"])){
        return true;
    }
    return false;
}

function existe($nombre){
    if (isset($_REQUEST[$nombre]))
        return true;
    return false;
}

function crearBD(){ 
    $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'], USR, PAS);
    $script = file_get_contents("./sql/zapatillas.sql");
    $consulta = $conexion->prepare($script);
    $consulta->execute();
}

// modificar BD

function validaUser($user, $pass) {
    try {
        $conexion = new PDO("mysql:host=".$_SERVER["SERVER_ADDR"].";dbname=".BD, USR, PAS);
        $sql = "select * from usuarios where nombre = ? and pass = ?";
        $sql_p = $conexion->prepare($sql);
        $pass_e = sha1($pass);
        $array = array($user, $pass_e);
        $sql_p->execute($array);

        //si devuelve algo retorna true
        if($sql_p->rowCount() == 1){
            session_start();
            $_SESSION['validado'] = true;
            $row = $sql_p->fetch();
            $_SESSION['user'] = $user;
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['perfil'] = $row['perfil'];
            unset($conexion);
            return true;
        } else {
            // si no, no retorna falso
            unset($conexion);
            return false;
        }



    } catch (Exception $ex) {
        print_r($ex);
        unset($conexion);
    }

}

function nuevoUsuario() {
    try {
        $conexion = new PDO("mysql:host=".$_SERVER["SERVER_ADDR"].";dbname=".BD, USR, PAS);
        $script = "insert into usuarios (usuario, clave, fechanac, perfil);";
        $consulta = $conexion->prepare($script);
        $array = array("usuario" => $_REQUEST["user"], "nombre" => $_REQUEST["nombre"], "clave" => sha1($_REQUEST["pass"]), "correo" => $_REQUEST["email"], "fechanac" => $_REQUEST["fecha"], "perfil" => $_REQUEST["perfil"]);
        $consulta->execute($array);

    } catch (Exception $ex) {
        print_r($ex);
        unset($conexion);
    }
}


function eliminarProducto(){
    try {
        $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname='.BD, USR, PAS);

        $script = "delete from productos where id='".$_REQUEST["cod_producto"]."';";
        $consulta = $conexion->prepare($script);
        $consulta->execute();
    
    } catch (Exception $ex) {
        if ($ex->getCode()==1045){
            echo "Credenciales incorrectas";
        }
        if ($ex->getCode()==2002){
            echo "Acabado tiempo de conexión";
        }       
        if ($ex->getCode()==1049){
            echo "No existe la base de datos no existe";
        }       
    }  
}

function comprarProducto() {
    try {
        $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname='.BD, USR, PAS);

        $script = "update producto SET stock = stock - 1 WHERE cod_producto = ".$_REQUEST["id"].";";
        
        $consulta = $conexion->prepare($script);
        $consulta->execute();
        
    } catch (Exception $ex) {
        if ($ex->getCode()==1045){
            echo "Credenciales incorrectas";
        }
        if ($ex->getCode()==2002){
            echo "Acabado tiempo de conexión";
        }       
        if ($ex->getCode()==1049){
            echo "No existe la base de datos no existe";
        }       
    }
}

function ticketVenta() {
    try {
        $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname='.BD, USR, PAS);

        $script = "insert into ventas (usuario, fechacomp, cod_producto, cantidad, precio_total) values ('".$_SESSION['nombre']."','".date('Y M D')."','".$_REQUEST["id"]."','1','".$_REQUEST['precio']."')";
        
        $consulta = $conexion->prepare($script);
        $consulta->execute();
        
    } catch (Exception $ex) {
        if ($ex->getCode()==1045){
            echo "Credenciales incorrectas";
        }
        if ($ex->getCode()==2002){
            echo "Acabado tiempo de conexión";
        }       
        if ($ex->getCode()==1049){
            echo "No existe la base de datos no existe";
        }       
    }
}

// expresiones regulares

function vacio($nombre){
    if(empty($_REQUEST[$nombre])){
        return true;
    }
    return false;
}

function compPass($pass){
    $patron = '/^.{8}[A-Z]{1}[a-z]{1}[0-9]{1}$/';
    if(preg_match($patron, $_REQUEST[$pass]) == 1){
        return true;
    }
    return false;
}

function compMail($mail){
    $patron = '/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/';
    if(preg_match($patron, $_REQUEST[$mail]) == 1){
        return true;
    }
    return false;
}

function compFecha($fecha){
    $patron = '/^(\d{4})\-(0[1-9]|1[0-2])\-([0-2][0-9]|3[0-1])$/';
    
    if(preg_match($patron, $_REQUEST[$fecha])==1){
        return true;
    }
    return false;
}

function compTodo() {
    if(!vacio("user")){
        if(!vacio("nombre")){
            if(!vacio("pass") && compPass("pass")){
                if(!vacio("mail") && compMail("mail")){
                    if(!vacio("fecha") && compFecha("fecha")){
                        if(existe("perfil") && $_REQUEST["perfil"] != 0){
                            return true;
                        }
                    }
                }
            }
        }
    }
    return false;
}

?>