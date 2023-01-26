<?


$url = 'http://dataservice.accuweather.com/locations/v1/cities/search?apikey=%20%09Z62GO88Zr8un5dYgVPsnXojynU44G1AG&q=zamora%20Castilla%20y%20Le%C3%B3n&language=es';
$url2 = 'https://pokeapi.co/api/v2/pokemon/?limit=300';

$datos = file_get_contents($url);

if($datos) {
    $array = json_decode($datos, true);
    foreach($array['@graph'] as $evento) {
        //print_r($evento);
        echo $evento['title'];
        echo "<br>";
    }
}