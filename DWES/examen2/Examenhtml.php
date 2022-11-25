<?php
    require("./libreria.php");
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <style>
        *,
        input {
            margin: 10px;
        }
    </style>
    <?php
    $array = array(
        "1DAM" => array("ENDE", "BD", "LM", "SI", "FOL"),
        "2DAM" => array("DI", "SGE", "ACDA", "EIE", "PSP"),
        "2DAW" => array("DWES", "DWEC", "DIW", "EIE")
    );
    ?>
    <form action="./Examenhtml.php" method="post">
        <label for="nombre">Nombre y apellidos:</label> 
        <input type="text" name="nombre" id="nombre" value="<?php
            if(enviado() && !vacio("nombre")){
                echo $_REQUEST["nombre"];
            }
        ?>">
        <?php
            if(enviado()){
                if(vacio("nombre")){
                    echo "<span style='color: red;'><-- Rellena el campo</span>";
                } else if(!compNombre("nombre")){
                    echo "<span style='color: red;'><-- El formato es Mmm Mmm Mmm</span>";
                }
            }
        ?>
        <br> <label for="exp">Expediente</label> 
        <input type="text" name="exp" id="exp" value="<?php
            if(enviado() && !vacio("exp")){
                echo $_REQUEST["exp"];
            }
        ?>">
        <?php
            if(enviado()){
                if(vacio("exp")){
                    echo "<span style='color: red;'><-- Rellena el campo</span>";
                } else if(!compExpediente("exp")){
                    echo "<span style='color: red;'><-- El formato es Mmm Mmm Mmm</span>";
                }
            }
        ?>
        <br> <label for="curso">Curso:</label> 
        <select name="curso1" id="curso1">
            <option value="no">Selecione una opcion</option><?php
                $cont = 0;
                foreach($array as $valores => $value){
                    echo "<option value='".$cont++."'>".$valores."</option>";
                }
                if(existe("curso1") && $_REQUEST["curso1"] == "no"){
                    echo "<span style='color: red;'><-- seleccione una opcion</span>";
                }
            ?>
        </select>
        <input type="hidden" name="curso" value="<?php
            if(enviado() && !vacio("curso")){
                echo $_REQUEST["curso"];
            }
        ?>">
        <br>
        <?php
            if(compPrimera()){
                echo "Asignaturas: ";
                foreach($array as $cursos => $modulos){
                    if($_REQUEST["curso1"] == $modulos){
                        foreach($modulos as $valor){
                             echo "<input type='checkbox' name='check[]' id='".$valor."' value='".$valor."'>";
                            echo "<label for='".$valor."'>".$valor."</label>";
                        }
                    }
                }
            }

            ?>
        <?php
            if(compTotal()){
                header("./mostrar.php?nombre=".$_REQUEST["nombre"]."&exp=".$_REQUEST["exp"]."&curso=".$_REQUEST["curso1"]."modulo=".$_REQUEST["check"]);
                exit();
            }
        ?>
        <br><input type="submit" name="Enviado" value="Enviar">
    </form>



</body>

</html>