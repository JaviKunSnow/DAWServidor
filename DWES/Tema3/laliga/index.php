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
    
    $liga =
    array(
        "Zamora" =>  array(
            "Salamanca" => array(
                "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
            ),
            "Avila" => array(
                "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
            ),
            "Valladolid" => array(
                "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 1
            )
        ),
        "Salamanca" =>  array(
            "Zamora" => array(
                "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
            ),
            "Avila" => array(
                "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
            ),
            "Valladolid" => array(
                "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 2, "Penalti" => 1
            )
        ),
        "Avila" =>  array(
            "Zamora" => array(
                "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 2
            ),
            "Salamanca" => array(
                "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 3, "Penalti" => 0
            ),
            "Valladolid" => array(
                "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 0, "Penalti" => 1
            )
        ),
        "Valladolid" =>  array(
            "Zamora" => array(
                "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
            ),
            "Salamanca" => array(
                "Resultado" => "3-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
            ),
            "Avila" => array(
                "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 2
            ),
        ),
    );

    ?>

    <table border="1">
        <tr>
            <th>equipos</th>
            <?php
                $locales = array();
                foreach($liga as $key => $valor){
                    echo "<th> $key </th>";
                    array_push($locales, $key);
                }
            ?>
        <tr>
        <tr>
            <?php
            
            foreach($liga as $key => $valor){
                $i = 0;
                echo "<tr><td> $key </td>";               
                
                foreach($valor as $equipo => $resultado){
                    if($key == $locales[$i]){
                        echo "<td>&nbsp;</td>";
                    }
                    echo "<td>";
                    foreach($resultado as $clave => $re){
                        echo "<P>$re<P>";
                    }
                    echo "</td>";
                    $i++;
                }
                 
                echo "</tr>";
            }
            

            ?>

    </table>
    <br>
    <table border="1">
        <tr>
            <th>equipos</th>
            <th>puntos</th>
            <th>goles a favor</th>
            <th>goles en contra</th>
        </tr>
        <?php
            $resultados = array(
                "Zamora" => array(
                    "Puntos" => "0", "GF" => 0, "GC" => "0"
                ),
                "Salamanca" => array(
                    "Puntos" => "0", "GF" => 0, "GC" => "0"
                ),
                "Avila" => array(
                    "Puntos" => "0", "GF" => 0, "GC" => "0"
                ),
                "Valladolid" => array(
                    "Puntos" => "0", "GF" => 0, "GC" => "0"
                ),
            );

            foreach($liga as $key => $valor){ 
                $i = 0;
                foreach($valor as $equipo => $resultado){
                    list($rl, $rv) = explode("-", $resultado["Resultado"]);
                    if($rl > $rv){
                        $resultados[$key]["Puntos"] += 3;
                    } else if($rl == $rv){
                        $resultados[$key]["Puntos"] += 1;
                        $resultados[$equipo]["Puntos"] += 1;
                    } else {
                        $resultados[$equipo]["Puntos"] += 3;
                    }
                    $resultados[$key]["GF"] += $rl;
                    $resultados[$key]["GC"] += $rv;
                    $resultados[$equipo]["GC"] += $rl;
                    $resultados[$equipo]["GF"] += $rv;
                    
                }

            }

            foreach($resultados as $key => $valor){
                echo "<tr><td> $key </td>";

                foreach($valor as $clave => $res){
                    echo "<td>$res</td>";
                }
                echo "</tr>";
            }

        ?>
        </tr>
        <?php



        ?>
    </table>
</body>
</html>