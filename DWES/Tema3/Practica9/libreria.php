<?php
   function vacio($nombre){
        if(empty($_REQUEST[$nombre])){
            return true;
        }
        return false;
    }

    function enviado(){
        if(isset($_REQUEST["enviar"])){
            return true;
        }
        return false;
    }

    function existe($nombre){
        if(isset($_REQUEST[$nombre])){
           return true;
        }
        return false;
    }

    function compNombre($nombre){
        $patron = '/\D{3,}/';
        if(preg_match($patron, $_REQUEST[$nombre]) == 1){
            return true;
        }
        return false;
    }

    function compApellidos($apellidos){
        $patron = '/\D{3,}\s\D{3,}/';
        if(preg_match($patron, $_REQUEST[$apellidos]) == 1){
            return true;
        }
        return false;
    }

    function compPass($pass){
        $patron = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/';
        if(preg_match($patron, $_REQUEST[$pass]) == 1){
            return true;
        }
        return false;
    }

    function compFecha($fecha){
        $patron = '/^([0-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/(\d{4})$/';
        
        if(preg_match($patron, $_REQUEST[$fecha])==1){
            
            $valores = explode('/', $_REQUEST[$fecha]);
            
            if(checkdate($valores[1], $valores[0], $valores[2])){
                return true;
            } 
            
        }
        return false;
    }

    function compEdad($fecha){
        $fechaactual = new dateTime();
        $fechacomp = new dateTime($_REQUEST[$fecha]);
        $intervalo = $fechaactual->diff($fechacomp);  
        
        if($intervalo->y >= 18){
            return true;
        }
        return false;
    }

    function compDNI(){
        $patron= '/\d{8}[T|R|W|A|G|M|Y|F|P|D|X|B|N|J|Z|S|Q|V|H|L|C|K|E]$/';
        if (preg_match($patron,$_REQUEST['dni'])==1){
            $letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
            $num= substr($_REQUEST['dni'],0,8);
            $dni=$_REQUEST['dni'];
            if ($dni[8] == $letras[$num%23]){
                    return true;
            }
        }
        return false;
    }

    function compCorreo($correo){
        $patron = '/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/';

        if(preg_match($patron,$_REQUEST[$correo])==1){
            return true;
        }
        return false;
    }

    function compFichero(){
        $patron = '/^[^.]+\.(jpg|bmp|png)$/';

        if(preg_match($patron, $_FILES['fichero']['name'])==1){
            return true;
        }
        return false;
    }

    function subirImagen(){
        $ruta = './imagenes/'. $_FILES['fichero']['name'];
        move_uploaded_file($_FILES['fichero']['tmp_name'], $ruta);
    }

    function compTotal(){
        if (enviado()) {
            if (!vacio("nombre") && compNombre("nombre")) {
                 if (!vacio("apellido") && compApellidos("apellido")) {
                    if(!vacio("pass") && compPass("pass")){
                        if(!vacio("passr") && $_REQUEST["passr"]==$_REQUEST["pass"]){
                            if (!vacio("fecha") && compFecha("fecha")) {
                                if (!vacio("dni") && compDNI("dni")) {
                                    if (!vacio("mail") && compCorreo("mail")) {
                                        if(file_exists($_FILES['fichero']['tmp_name']) && compFichero("fichero")){
                                            subirImagen();
                                            return true;
                                        }
                                    }
                                }
                            }
                        }
                    } 
                 }
            }
         }
         return false;
    }

    function mostrarDatos(){
        echo "<h1>Datos insertados:</h1>";
        echo "<p>Nombre: ". $_REQUEST["nombre"] . "</p>";
        echo "<p>Apellidos: ". $_REQUEST["apellido"] . "</p>";
        echo "<p>Contraseña: ". $_REQUEST["pass"] . "</p>";
        echo "<p>Fecha: ". $_REQUEST["fecha"] . "</p>";
        echo "<p>DNI: ". $_REQUEST["dni"] . "</p>";
        echo "<p>correo electronico: ". $_REQUEST["mail"] . "</p>";
        echo '<p>fichero: </p><img src="./imagenes/'.$_FILES['fichero']['name'].'" width="300px">';
     }

?>