<?php

if(!isset($_SESSION["enviado"]) && !isset($_SESSION["apuesta"])) {
    $_SESSION["enviado"] = false;
    $_SESSION["apuesta"] = false;
} else {
    if(isset($_REQUEST["enviar"])) {
        if(isset($_REQUEST["check"])) {
            if(count($_REQUEST["check"]) == 5) {
                $_SESSION["enviado"] = true;
                $arrayChecks = $_REQUEST["check"];
                $apuestasTotal = ApuestaDAO::findAll();
                $apuesta = new Apuesta(count($apuestasTotal) + 1,date('Y-m-d'), $_SESSION['id'], $arrayChecks[0], $arrayChecks[1], $arrayChecks[2], $arrayChecks[3], $arrayChecks[4]);
                if(ApuestaDAO::insert($apuesta)) {
                    $_SESSION["apuesta"] = true;
                    $_SESSION["apuestaId"] = $apuesta->id;
                }
            } else {
                $_SESSION["error"] = "No has seleccionado 5 apuestas.";
            }
        } else {
            $_SESSION["error"] = "No has seleccionado ningun numero.";
        }

    } else if(isset($_REQUEST["modificar"])) {
        if(isset($_REQUEST["check"])) {
            if(count($_REQUEST["check"]) == 5) {
                $arrayChecks = $_REQUEST["check"];
                $arrayDatos = array($arrayChecks[0], $arrayChecks[1], $arrayChecks[2], $arrayChecks[3], $arrayChecks[4], $_SESSION["apuestaId"]);
                if(ApuestaDAO::update($arrayDatos)) {
    
                }
            } else {
                $_SESSION["error"] = "No has seleccionado 5 apuestas.";
            }
        } else {
            $_SESSION["error"] = "No has seleccionado ningun numero.";
        }
    }
}