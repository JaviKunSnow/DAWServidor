<?php
    require("./libreria.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="./mostrar.php" method="post">
        <input type="hidden" name="nombre" value="<?php
            echo $_REQUEST["nombre"];
        ?>">
        <input type="hidden" name="exp" value="<?php
            echo $_REQUEST["exp"];
        ?>">
        <input type="hidden" name="curso" value="<?php
            echo $_REQUEST["curso"];
        ?>">
        <input type="hidden" name="check" value="<?php
            echo $_REQUEST["check"];
        ?>">
        <?php
            echo "nombre y apellidos: ".$_REQUEST["nombre"];
            echo "<br>";
            echo "expediente: ".$_REQUEST["exp"];
            echo "<br>";
            echo "curso: ".$_REQUEST["curso"];
            echo "<br>";
            echo "modulos: ".$_REQUEST["check"];
        ?>
    </form>
</body>
</html>