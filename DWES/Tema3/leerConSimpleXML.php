<?php

$mundial = simplexml_load_file("mundial.xml");

$equipo2 = $mundial->children();
$equipo2->children()[2] = "sasdasd";
$equipo = $mundial->addChild("Equipo");
$equipo->addChild("Nombre", "Italia");
$equipo->addChild("Entrenador", "Alex");

$mundial->asXML("mundial.xml");
?>