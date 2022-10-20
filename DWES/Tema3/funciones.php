<?php  

    // sin parametros
    function saludo(){
        echo "hola";
    }

    // con un parametro
    function saludo2($nombre){
        echo "hola " .$nombre;

    }

    // parametros tipo normales
    function saludo3($nombre){
        $nombre = $nombre . "valor";
        echo $nombre;
    }

    //cambiar una funcion global
    function saludo4(){
        global $nombre;
        $nombre = $nombre . "valor";
        echo $nombre;
    }

    // que devuelva return
    function saludo5($nombre){
        $nombre = $nombre . "valor";
        echo $nombre;
        return $nombre;
    }
    

    //por referencia

    function saludo6(&$nombre){
        $nombre = $nombre . "valor";
        echo $nombre;
    }

    // funcion que si no le pasamos valores use por defecto

    function saludo7($nombre = "pablo"){
        $nombre = $nombre . "valor";
        echo $nombre;
    }

    // pasar un array

    function rellenaArray($array){
        array_push($array, date("h:i:s"));
        print_r($array);
    }

    function cambioLado($objeto, $lado){
        $objeto -> lado = $lado;
    }
?>