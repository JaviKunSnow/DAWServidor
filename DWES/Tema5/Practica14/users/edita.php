<?php

if($_REQUEST["opc"] == "mod") {
    header('location: ./../php/editaBD.php?opc='.$_REQUEST["opc"].'&numeroID='.$_REQUEST["numeroID"].'');
} else if($_REQUEST["opc"] == "ins") {
    header('location: ./../php/editaBD.php?numeroID='.$_REQUEST["numeroID"].'');
}

?>