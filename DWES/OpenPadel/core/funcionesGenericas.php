<?php
// Funcion que valida si está vacío un campo
function validaSiVacio($campo,$submit){
    // Si se ha enviado el formulario...
    if (validaEnviado($submit)){
        // Si no está vacío
        if (!empty($_REQUEST[$campo])) 
        {
            // Muestro el valor del campo en el input
            //echo $_REQUEST[$campo];

            $correcto = true;
        }
        else 
            $correcto = false;

        return $correcto;
    }
}
 // Función que valida que se ha enviado el formulario
 function validaEnviado($submit){
    // Si se ha enviado...
    if (isset($_REQUEST[$submit])) 
        $correcto = true;
    else 
        $correcto = false;

    return $correcto;
}

?>