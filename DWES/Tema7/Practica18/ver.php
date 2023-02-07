<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
<?php



$conexion = curl_init();

curl_setopt($conexion, CURLOPT_URL, "http://dataservice.accuweather.com/locations/v1/cities/search?apikey=Z62GO88Zr8un5dYgVPsnXojynU44G1AG&q=".$_REQUEST['ciudad']."%20Castilla%20y%20Le%C3%B3n&language=es");
curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
curl_setopt($conexion, CURLOPT_HEADER, 0);

$datos1 = curl_exec($conexion);
$datos = json_decode($datos1, true);

curl_setopt($conexion, CURLOPT_URL, "http://dataservice.accuweather.com/forecasts/v1/daily/5day/".$datos[0]['Key']."?apikey=Z62GO88Zr8un5dYgVPsnXojynU44G1AG&language=es");
curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
curl_setopt($conexion, CURLOPT_HEADER, 0);

$datosTiempo = curl_exec($conexion);
$datosTiempo = json_decode($datosTiempo, true);
curl_close($conexion);

function conversorCelsius($temp) {
    return ($temp - 32) * (5/9);
}

?>

<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <caption>Tiempo en <?echo $_REQUEST['ciudad']?></caption>
            <tr>
                <th scope="col"></th>
                <th scope="col">LUNES</th>
                <th scope="col">MARTES</th>
                <th scope="col">MIERCOLES</th>
                <th scope="col">JUEVES</th>
                <th scope="col">VIERNES</th>
            </tr>
        </thead>
        <tbody>
            <tr class="">
                <td scope="row">MINIMO TEMP</td><?
                foreach($datosTiempo['DailyForecasts'] as $value) {
                    $temp = $value['Temperature']['Minimum']['Value'];
                    echo "<td scope='row'>".conversorCelsius($temp)."</td>";
                }
                ?>
            </tr>
            <tr class="">
                <td scope="row">MAX TEMP</td><?
                foreach($datosTiempo['DailyForecasts'] as $value) {
                    $temp = $value['Temperature']['Maximum']['Value'];
                    echo "<td scope='row'>".conversorCelsius($temp)."</td>";
                }
                ?>
            </tr>
            <tr class="">
                <td scope="row">PRECIPITACIONES DIA</td><?
                foreach($datosTiempo['DailyForecasts'] as $value) {
                    $prec = $value['Day']['HasPrecipitation'];
                    if($prec == null) {
                        echo "<td scope='row'>NO</td>";
                    } else {
                        echo "<td scope='row'>YES</td>";
                    }
                }
                ?>
            </tr>
            <tr class="">
                <td scope="row">PRECIPITACIONES NOCHE</td><?
                foreach($datosTiempo['DailyForecasts'] as $value) {
                    $prec = $value['Night']['HasPrecipitation'];
                    if($prec == null) {
                        echo "<td scope='row'>NO</td>";
                    } else {
                        echo "<td scope='row'>YES</td>";
                    }
                }
                ?>
            </tr>
        </tbody>
    </table>
</div>


<a class="btn btn-primary" href="index.php" role="button">Volver</a>

<?php


?>
<pre><?
    print_r($datosTiempo);
    ?>
</pre>