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
    <h1>Formulario</h1>
    <?php
        
        /*if(comprobacion() == true){
            mostrarResultados();
        } else { */

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
                        ?>
                            <span style="color: red;"><-- Rellene el nombre</span>
                        <?
                    } else if(!compNombre("nombre")){
                        ?>
                            <span style="color: red;"><-- Minimo tiene que tener 3 caracteres</span>
                        <?
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
                        ?>
                            <span style="color: red;"><-- Rellene los apellidos</span>
                        <?
                    } else if(!compApellidos("apellido")){
                        ?>
                            <span style="color: red;"><-- Minimo tiene que tener 3 caracteres en cada uno</span>
                        <?
                    }
                }    
            ?>
        </p>       
        <p>
            <label for="idFecha">Fecha</label>
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
                        ?>
                            <span style="color: red;"><-- Fecha no puede estar vacia</span>
                        <?
                    } else if(!compFecha("fecha")){
                        ?>
                            <span style="color: red;"><-- Fecha incorrecta</span>
                        <?
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
                    ?>
                        <span style="color: red;"><-- Rellene el dni</span>
                    <?
                } else if(!compDNI("dni")){
                    ?>
                        <span style="color: red;"><-- </span>
                    <?
                }
            }
            ?>
        </p>
        <p>
            <label for="idEmail">Email</label>    
            <input type="email" name="mail" id="idMail" placeholder="mail" value=
            "<?php
                if(enviado() && !vacio("mail")){
                    echo $_REQUEST["mail"];
                }
            ?>"
            >
            <?php
                if(enviado()){
                    if(vacio("mail")){
                        ?>
                            <span style="color: red;"><-- No has introducido email</span>
                        <?
                    }
                }
            ?>
        </p>
        <input type="submit" value="enviar" name="enviar">
    </form>
    <?php
      // }
    ?>
        <h2>Ver codigo:</h2>
        <div class="cajalink2">
            <a href="verCodigo.php?valor=index.php"><p>Ver codigo index</p></a>
        </div>
        <div class="cajalink2">
            <a href="verCodigo.php?valor=funcion.php"><p>Ver codigo funcion</p></a>
        </div>    
    </div>
</body>
</html>