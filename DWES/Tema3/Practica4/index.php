<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Practica 4</title>
    <link rel="stylesheet" href="../../../CSS/estilos.css">
</head>
<body>
    <?php
        include_once("../../../cabecera.html");
    ?>
    <?php
        $valor = (int)$_GET["lista"];
        echo "<h2>1. Realiza un programa utilizando bucles que muestre la siguiente figura:</h2>";
        for($i = 1; $i <= $valor; $i++){
            for($blanco = 1; $blanco <= $valor-$i; $blanco++){
                echo "&nbsp;&nbsp;";
            }
        
            for($astericos=1; $astericos <= ($i*2) - 1; $astericos++){
                echo "*";
            }
            echo "<br>";   
        }
        echo "<h2>2. Realiza un programa utilizando bucles que muestre la siguiente figura:</h2>";
        for($i = 1; $i <= $valor; $i++){
            for($blanco = 1; $blanco <= $valor-$i; $blanco++){
                echo "&nbsp;&nbsp;";
            }
        
            for($astericos=1; $astericos <= ($i*2) - 1; $astericos++){
                echo "*";
            }
            echo "<br>";
        }
        for($i = $valor; $i >= 1; $i--){
            for($blanco = 1; $blanco <= $valor-$i; $blanco++){
                echo "&nbsp;&nbsp;";
            }
        
            for($astericos=1; $astericos <= ($i*2)-1; $astericos++){
                echo "*";
            }
            echo "<br>";
        }
        echo "<h2>3. Realiza un programa utilizando bucles que muestre la siguiente figura:</h2>";
        for($i = 1; $i <= $valor; $i++){
            for($blanco = 1; $blanco <= $valor-$i; $blanco++){
                echo "&nbsp;&nbsp;";
            }

            for($astericos=1; $astericos <= ($i*2) - 1; $astericos++){
                if($astericos == 1 || $astericos == ($i*2)-1){
                    echo "*";
                } else {
                    echo "&nbsp;&nbsp;";
                }
            }
            echo "<br>";
        }
        for($i = $valor; $i >= 1; $i--){
            for($blanco = 1; $blanco <= $valor-$i; $blanco++){
                echo "&nbsp;&nbsp;";
            }

            for($astericos=1; $astericos <= ($i*2)-1; $astericos++){
                if($astericos == 1 || $astericos == ($i*2)-1){
                    echo "*";
                } else {
                    echo "&nbsp;&nbsp;";
                }
            }
            echo "<br>";
        }
        echo "<h2>4. Realiza un programa utilizando bucles que muestre la siguinte: </h2>";
        
        echo "<br>";
        echo "<h2>5. Escriba un programa que se le paso un año por url y diga si es bisiesto o no: </h2>";
        $year = (int)$_GET["ano"];
        if($year%4 == 0 && $year%100 != 0 || $year%400 == 0){
            echo "<p>el año ". $year . " es bisiesto.</p>";
        } else {
            echo "<p>el año ". $year . " NO es bisiesto.</p>";
        }

    ?>
</body>
</html>