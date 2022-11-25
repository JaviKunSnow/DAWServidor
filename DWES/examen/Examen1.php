<?php
    $valores = array();
    $nuevo = array();
    $fecha = date("D, d M Y h:m:s", strtotime("now")). date_default_timezone_get();
        // Leo el fichero y lo añado al array previamente creado.
        if($fichero = fopen("examen.csv", "r+")){
            while(($datos = fgetcsv($fichero, filesize("examen.csv"), ";")) !== false){
                array_push($valores, $datos);
            }
            fclose($fichero);
        }

        $ip = array($_SERVER['REMOTE_ADDR']);

        // intento comparar si la IP pasada se encuentra en el array.
        if(in_array($ip, $valores)){
            foreach($valores as $value){
                if($value[0] == $_SERVER['REMOTE_ADDR']){
                    $value[1]++;
                    $value[2] = $fecha = date("D, d M Y h:m:s", strtotime("now")). date_default_timezone_get();
                }
            }
        // Si no esta, añado los nuevos valores    
        } else {
            $nuevo[0] = $_SERVER['REMOTE_ADDR'];
            $nuevo[1] = 1;
            $nuevo[2] = $fecha;
            array_push($valores, $nuevo);
        }

        // sobreescribo el fichero
        if($fichero = fopen("examen.csv", "w")){
            foreach($valores as $campos){
                fputcsv($fichero, $campos, ";");
            }
        }

        // vuelvo a leer el fichero pero mostrando los valores.
        if($fichero = fopen("examen.csv", "r+")){
            while(($datos = fgetcsv($fichero, filesize("examen.csv"), ";")) !== false){  
                echo "<b>ip</b>:".$datos[0];
                echo " <b>Veces</b>:".$datos[1];
                echo " <b>Fecha</b>:".$datos[2];
                echo "<br>";
            }
        } 



?>