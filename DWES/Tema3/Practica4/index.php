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
        echo "<h2>4. Muestra el número mínimo de monedas con las que puedes devolver el cambio: </h2>";
        
        $precio=(float)$_GET['precio'];
        $pago=(float)$_GET['pago'];
        $devolucion=$pago-$precio;
   
        $mon2euro=0;
        $mon1euro=0;
        $cent50=0;
        $cent20=0;
        $cent10=0;
        $cent5=0;
        $cent2=0;
        $cent1=0;

        while ($devolucion>=2) {
            $devolucion-=2;
            $mon2euro++;
        }
        while ($devolucion>=1) {
            $devolucion-=1;
            $mon1euro++;
        }
        while ($devolucion>=0.50) {
            $devolucion-=0.50;
            $cent50++;
        }
        while ($devolucion>=0.20) {
            $devolucion-=0.20;
            $cent20++;
        }
        while ($devolucion>=0.10) {
            $devolucion-=0.10;
            $cent10++;
        }
        while ($devolucion>=0.05) {
            $devolucion-=0.05;
            $cent5++;
        }
        while ($devolucion>=0.02) {
            $devolucion-=0.02;
            $cent2++;
        }
        while ($devolucion>=0.01) {
            $devolucion-=0.01;
            $cent1++;
        }

        echo "Se devuelven " . $mon2euro . " monedas de 2€";
        echo "<br>";
        echo "Se devuelven " . $mon1euro . " monedas de 1€";
        echo "<br>";
        echo "Se devuelven " . $cent50 . " monedas de 50 cent";
        echo "<br>";
        echo "Se devuelven " . $cent20 . " monedas de 20 cent";
        echo "<br>";
        echo "Se devuelven " . $cent10 . " monedas de 10 cent";
        echo "<br>";
        echo "Se devuelven " . $cent5 . " monedas de 5 cent";
        echo "<br>";
        echo "Se devuelven " . $cent2 . " monedas de 2 cent";
        echo "<br>";
        echo "Se devuelven " . $cent1 . " monedas de 1 cent";

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