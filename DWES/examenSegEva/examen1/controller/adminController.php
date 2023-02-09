<?php

$lista = ApuestaDAO::findAll();

if(!isset($_SESSION["sorteo"])) {
    $_SESSION["sorteo"] = false;
} else {
    if(isset($_REQUEST["generar"])) {
        $_SESSION["sorteo"] = true;
        $numerosAlt = get();
        $numAlt = explode(',', $numerosAlt);
        //$numAlt = preg_split('/[\s[][\s,]/', $numerosAlt);
        $sorteosTotal = sorteoDAO::findAll();
        $sorteo = new Sorteo(count($sorteosTotal) + 1,date('Y-m-d'), $numAlt[0], $numAlt[1], $numAlt[2], $numAlt[3], $numAlt[4]);
        if(SorteoDAO::insert($sorteo)) {
            $_SESSION["sorteoID"] = $sorteo->id;
        }
    }
}

?>