<?php
    require("./libreria.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../CSS/estilos.css">
    <title>Document</title>
</head>
<body>
    <?php
        include_once("../../../cabecera.html");
    ?>
    <div class="caja4">
    <?php

    if(compTotal()){
        mostrarDatos();
    } else {
        echo "<h1>Formulario</h1>";
    ?>
    <form action="./index.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="idNombre">Nombre: </label>    
            <input type="text" name="nombre" id="idNombre" placeholder="nombre" value=
            "<?php
                if(enviado() && !vacio("nombre")){
                    echo $_REQUEST["nombre"];
                }
            ?>"
            >
            <?php
                if(enviado()){
                    if(vacio("nombre")){
                        echo"<span style='color: red;'><-- Rellene el nombre</span>";
                    } else if(!compNombre("nombre")){
                        echo "<span style='color: red;'><-- Minimo tiene que tener 3 caracteres en cada uno</span>";
                    }
                }
            ?>
        </p>
        <p>
            <label for="idApellido">Apellidos: </label>    
            <input type="text" name="apellido" id="idApellido" placeholder="Apellidos" value=
            "<?php
                if(enviado() && !vacio("apellido")){
                    echo $_REQUEST["apellido"];
                }
            ?>"
            >
            <?php
                if(enviado()){
                    if(vacio("apellido")){
                        echo "<span style='color: red;'><-- Rellene los apellidos</span>";
                    } else if(!compApellidos("apellido")){
                        echo "<span style='color: red;'><-- Minimo tiene que tener 3 caracteres en cada uno</span>";
                    }
                }  
            ?>
        </p>
        <p>
            <label for="idPass">Contraseña: </label>    
            <input type="text" name="pass" id="idPass" placeholder="Contraseña" value=
            "<?php
                if(enviado() && !vacio("pass")){
                    echo $_REQUEST["pass"];
                }
            ?>"
            >
            <?php
                if(enviado()){
                    if(vacio("pass")){
                        echo "<span style='color: red;'><-- Rellene la contraseña</span>";
                    } else if(!compPass("pass")){
                        echo "<span style='color: red;'><-- La contraseña no cumple los requisitos</span>";
                    }
                }  
            ?>
        </p>
        <p>
            <label for="idPassr">Repetir contraseña: </label>    
            <input type="text" name="passr" id="idPassr" placeholder="Contraseña" value=
            "<?php
                if(enviado() && !vacio("passr")){
                    echo $_REQUEST["passr"];
                }
            ?>"
            >
            <?php
                if(enviado()){
                    if(vacio("passr")){
                        echo "<span style='color: red;'><-- Rellene la contraseña</span>";
                    } else if($_REQUEST['passr']!=$_REQUEST['pass']){
                        echo "<span style='color: red;'><-- La contraseña no coincide</span>";
                    }
                }  
            ?>
        </p>       
        <p>
            <label for="idFecha">Fecha: </label>
            <input type="text" name="fecha" placeholder="fecha" id="idFecha" value=
            "<?php
                if(enviado() && !vacio("fecha")){
                    echo $_REQUEST["fecha"];
                }
            ?>"
            >
            <?php
                if(enviado()){
                    if(vacio("fecha")){
                        echo "<span style='color: red;'><-- Fecha no puede estar vacia</span>";
                    } else if(!compFecha("fecha")){
                        echo "<span style='color: red;'><-- Fecha incorrecta</span>";
                    } else if(!compEdad("fecha")){
                        echo "<span style='color: red;'><-- La edad tiene que ser mayor de 18 años</span>";
                    }
                }  
            ?>
        </p>
        <p>
            <label for="idDNI">DNI: </label>    
            <input type="text" name="dni" id="idDNI" placeholder="dni" value=
            "<?php
                if(enviado() && !vacio("dni")){
                    echo $_REQUEST["dni"];
                }
            ?>"
            >
            <?php
            if(enviado()){
                if(vacio("dni")){
                    echo "<span style='color: red;'><-- Rellene el dni</span>";
                } else if(!compDNI("dni")){
                    echo "<span style='color: red;'><-- dni invalido</span>";
                }
            } 
            ?>
        </p>
        <p>
            <label for="idEmail">Email: </label>    
            <input type="text" name="mail" id="idMail" placeholder="mail" value=
            "<?php
                if(enviado() && !vacio("mail")){
                    echo $_REQUEST["mail"];
                }
            ?>"
            >
            <?php
                if(enviado()){
                    if(vacio("mail")){
                        echo "<span style='color: red;'><-- No has introducido email</span>";
                    } else if(!compCorreo("mail")){
                        echo "<span style='color: red;'><-- El email no es correo</span>";
                    }
                }
            ?>
        </p>
        <p>
            <label for="idFichero">Fichero: </label>
            <input type="file" name="fichero" name="idFichero">
            <?php
                if(enviado()){
                    print_r($_FILES);
                    if(!file_exists($_FILES['fichero']['tmp_name'])){
                        echo "<span style='color: red;'><-- El fichero esta vacio</span>";
                    } else if(!compFichero()){
                        echo "<span style='color: red;'><-- El fichero no es una imagen</span>";
                    }
                }
            ?>
        </p>
        <input type="submit" value="enviar" name="enviar">
    </form>
    <?php
    }
    ?>
        <h2>Ver codigo:</h2>
        <div class="cajalink2">
            <a href="verCodigo.php?valor=index.php"><p>Ver codigo index</p></a>
        </div>
        <div class="cajalink2">
            <a href="verCodigo.php?valor=libreria.php"><p>Ver codigo libreria</p></a>
        </div>    
    </div>
</body>
</html>