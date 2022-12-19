<?php
//recoradar la sesion
    function recuerdame(){
       
        if($_POST['recordarme']=="on")
        {

            $user = $_REQUEST['nombre'];
            $pass = $_REQUEST['pass'];
            $encrip=sha1($pass);
            setcookie("recuerdame[0]",$user, time()+31536000, '/' );
            setcookie("recuerdame[1]",$encrip, time()+31536000, '/' );
            
        }
        
    }

    
?>