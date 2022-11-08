<?php

    // abrir fichero SI EXISTE
    // Si se va a abrir para lectura con r
    // comprobar que exista antes

    ?>
        <h2>LECTURA FICHERO</h2>
    <?

    //leer
    if(file_exists('miarchivo.txt')){
        echo "<br>Existe";
    } else {
        echo "<br>No existe";

    }

    if(!$fp = fopen("miarchivo.txt", "r")){
        echo "<br>Ha habido un problema para abrirlo";
    } else {
        $leer = fread($fp, filesize("miarchivo.txt"));
        echo "<br> $leer";
        fclose($fp);
    }

    // leer linea por linea

    if(!file_exists('miarchivo.txt')){
        echo "<br>No existe";
    } else {
        echo "<br>Existe";
        if(!$fp = fopen("miarchivo.txt", "r")){
            echo "<br>Ha habido un problema para abrirlo";
        } else {
            while($leer = fgets($fp, filesize("miarchivo.txt"))){
                echo "<br>";
                echo $leer;
            }
            fclose($fp);
        }
    }

    ?>
        <h2>ESCRIBIR EL FICHERO</h2>
    <?
    // escritura
    // abrir el fichero para w

    /*if($fp = fopen("michero.txt", "w")){
        $escribir = '08/11/22';
        fwrite($fp,$escribir,strlen($escribir));
        fclose($fp);
    } else {
        echo "<br>ha habido un error";
    }
    */

    // CAMBIAR FECHA

    if(!file_exists('michero.txt')){
        echo "<br>No existe";
    } else {
        echo "<br>Existe";
        if(!$fp = fopen("michero.txt", "r+")){
            echo "<br>Ha habido un problema para abrirlo";
        } else {
            $leer = fread($fp, filesize("michero.txt"));
            $remplazo = str_replace("22", "2022", $leer);
            rewind($fp);
            fwrite($fp,$remplazo,strlen($remplazo));
            fclose($fp);
        }
    }
?>