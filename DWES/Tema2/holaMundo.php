<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola Mundo</title>
</head>
<body>
    <?
    echo "<p>hola mundo</p>";
    print("<p>clase</p>");
    ?>

    <p><?echo "hola mundo"?></p>

    <h1>tipos de datos</h1>
    <?var_dump("Javier");
    var_dump(3);
    var_dump(3.20);
    var_dump(true);
    ?>
    <h1>
        <?
            $mivariable = 3;
            var_dump($mivariable);
            $mivariable = "Javier";
            echo "<br>";
            var_dump($mivariable);
            $miFloat = 3.17;
            echo "<br>";
            var_dump($miFloat);
            $nuevoInt = (int)$miFloat;
            var_dump($nuevoInt);
            echo "<br>";
            $variable3 = true;
            var_dump($variable3);
            echo "<br>";
            var_dump($vacua);
            $vacua = null;
            if(is_null($vacua)){
                echo "Es nula";
            }
        ?>
    </h1>
    <h1>GET</h1>
    <?
    var_dump ($_GET);
    ?>
    <h2>Coger datos</h2>
    <?php
        echo "La variable es de tipo ". gettype($mivariable);
        $variablenum = array(
            3,
            "2",
            4,
            "hola"
        );
        echo "<br>";
        foreach($variablenum as $elementos){
            if(is_numeric($elementos)){
                echo var_export($elementos, true) . " es numerico";
            } else {
                echo var_export($elementos, true) . " no es numerico";
            }
        }
        echo "<br>";
        echo "La variable de la url es " .($_GET["hijos"]), is_numeric($_GET["hijos"]);

        $viernes = "fiesta";
        $$viernes = "copas";
        echo "<br>";
        echo $viernes;
        echo "<br>";
        echo $$viernes;
        echo "<br>";
        echo $fiesta;
    ?>

</body>
</html>