<?php

require("../funciones/conexionBD.php");
require("../funciones/funcionesBD.php");

comprarProducto();
ticketVenta();

header('location: ../index.php');


?>