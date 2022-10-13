<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Idiomas</title>
</head>
<body>
    <?php
        /* $mivariable = $_GET['pais'];
        if($mivariable == "es"){
            echo "<h1>Hola Mundo</h1>";
        } elseif ($mivariable == "en") {
            echo "<h1>Hello World</h1>";
        } elseif ($mivariable == "de") {
            echo "<h1>Hallo Welt</h1>";
        } elseif ($mivariable == "pt") {
            echo "<h1>Olá mundo</h1>";
        } elseif ($mivariable == "it") {
            echo "<h1>Ciao mondo</h1>";
        } */

        $es="Hola Mundo";
        $en="Hello World";
        $de="Hallo Welt";
        $pt="Olá mundo";
        $it="Ciao mondo";
        $idioma=$_GET['pais'];
        echo `${$idioma}`;

    ?>
</body>
</html>