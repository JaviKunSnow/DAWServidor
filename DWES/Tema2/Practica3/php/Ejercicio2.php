<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../../CSS/estilos.css">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php
        include_once "../../../../cabecera.html";
    ?>
    <?php
        $variable = implode($_GET);
        echo "<h2>Variable pasada: </h2>";
        echo $variable;
        echo "<br>";
        echo "<h2>Tipo de la variable: </h2>";
        foreach($_GET as $valor){
            
            if(is_numeric($valor)){
                echo "<p>Es numerica</p>";
                echo "<h2>La variable es numerica, es tipo: </h2>";
                if(strpos($valor, '.') !== false){
                    echo "<p>float</p>";
                }else {
                    echo "<p>Entero</p>";
                }
            } else {
                echo gettype($valor);
            }
        }
    ?>
    <h2>LINK EJERCICIO 5:</h2>
    <div class="cajalink2">
        <a href="Ejercicio5.php?valor=2"><p>Ejercicio 5</p></a>
    </div>
</body>
</html>