<?php

$mundial = simplexml_load_file("mundial.xml");

foreach($mundial as $equipo){
    echo "Equipo: ".$equipo->children()[0]."<br>";
    echo "Entrenador: ".$equipo->children()[1]."<br>"; 
}

$equipo = $mundial->addChild("Equipo");
$equipo->addChild("Nombre", "Italia");
$equipo->addChild("Entrenador", "Alex");

$mundial->asXML("mundial.xml");
?>