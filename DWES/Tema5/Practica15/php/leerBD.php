<?php

require("../funciones/conexionBD.php");
require("../funciones/funcionesBD.php");
require("../funciones/tablasBD.php");
require("../funciones/validarBD.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../style/estilos.css">
</head>
<body>
    <header>

    </header>
    <main>
        <section>
            <?php

                if($_REQUEST["tabla"] == "producto") {
                    tablaProducto();
                } else if($_REQUEST["tabla"] == "ventas") {
                    tablaVentas();
                } else if($_REQUEST["tabla"] == "albaranes") {
                    tablaAlbaranes();
                }

            ?>
        </section>
    </main>
        <div class="cajalink2">
            <a href="editaBD.php?opc=ins">
                <p>Insertar datos</p>
            </a>
        </div>
        <br>
        <br>
        <h2>Ver codigo:</h2>
        <div class="cajalink2">
            <a href="verCodigo.php?valor=eligeFichero.php">
                <p>Ver codigo eligeFichero</p>
            </a>
        </div>
        <div class="cajalink2">
            <a href="verCodigo.php?valor=editaFichero.php">
                <p>Ver codigo editaFichero</p>
            </a>
        </div>
</body>
</html>