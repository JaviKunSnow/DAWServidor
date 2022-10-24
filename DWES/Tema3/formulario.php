<?php
    require("./funciones.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./formulario.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="idNombre">Nombre</label>
            <input type="text" name="nombre" id="idNombre" value=
            "<?php
                if(enviado() && !vacio("nombre")){
                    echo $_REQUEST["nombre"];
                }
            ?>"
            >
            <?php
                if(vacio("nombre") && enviado()){
                    ?>
                        <br>
                        <span style="color: red;">Rellene el nombre</span>
                    <?
                }
            ?>
        </p>
        <p>
            <label for="idPass">Contraseña</label>
            <input type="password" name="pass" id="idPass" value=
            "<?
                if(enviado() && vacio("pass")){
                    echo $_REQUEST["pass"];
                }
            ?>">
            <?php
                if(vacio("pass") && enviado()){
                    ?>
                        <br>
                        <span style="color: red;">Rellene la contraseña</span>
                    <?
                }
            ?>
        </p>
        <p>
            <label for="idMasculino">Masculino</label>
            <input type="radio" name="genero" id="idMasculino" value="Masculino" <?php
                if(enviado() && existe("genero") && $_REQUEST["genero"] == "Masculino")
                    echo "checked";
            ?>
            >
            <label for="idFemenino">Femenino</label>
            <input type="radio" name="genero" id="idFemenino" value="femenino" <?php
                if(enviado() && existe("genero") && $_REQUEST["genero"] == "femenino")
                    echo "checked";
            ?>
            >
            <?php
                if(!existe("genero") && enviado()){
                    ?>
                        <br>
                        <span style="color: red;">Elige un genero</span>
                    <?
                }
            ?>
        </p>
        <p>
            <label for="idDWES">DWES</label>
            <input type="checkbox" name="asig[]" id="idDWES" value="DWES" <?php
                if(enviado() && existe("asig") && $_REQUEST["asig"] == "DWES")
                    echo "checked";
            ?>
            >
            <label for="idDWEC">DWEC</label>
            <input type="checkbox" name="asig[]" id="idDWEC" value="DWEC" <?php
                if(enviado() && existe("asig") && $_REQUEST["asig"] == "DWEC")
                    echo "checked";
            ?>
            >        
            <?php
                if(!existe("asig") && enviado()){
                    ?>
                        <br>
                        <span style="color: red;">Elige una asignatura</span>
                    <?
                }
            ?>  
        </p>
        <p><b>Curso</b>
            <select name="curso" id="idCurso">
                <option value="0">Seleccionar opcion</option>
                <option value="1">Primero</option>
                <option value="2">Segunda</option>
            </select>        
        </p>
        <p>

            <input type="file" name="fichero" id="idFichero">

        </p>
        <input type="submit" value="enviar" name="enviar">
    </form>
    <?php
        if($_FILES){

        }


    ?>
</body>
</html>