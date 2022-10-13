<h2>valor y referencia</h2>
<?
$var = 1;
$var1 = $var;
echo $var ."<br>";
echo $var1 ."<br>";
$var1 = $var1 + 1;
echo $var ."<br>";
echo $var1 ."<br>";

$var = 1;
$var1 = &$var;
echo $var ."<br>";
echo $var1 ."<br>";
$var1 = $var1 + 1;
echo $var ."<br>";
echo $var1 ."<br>";

function crearCoches(){
    static $numeroVecesCreado = 0;
    $numeroVecesCreado = $numeroVecesCreado + 1;
    echo "<br>Ha sido creado un coche";
    echo "<br> coches creados " . $numeroVecesCreado;
}

echo "<br>";
crearCoches();

// variables globales

echo "<br>";
var_dump($_SERVER);
var_dump($_GET);
var_dump($_REQUEST);
var_dump($_ENV);
setcookie("Prueba1", "Javier");
var_dump($_COOKIE);
var_dump($_FILES);
session_start();
var_dump($_SESSION);

// tiempo

echo "<br>";
echo time() + (7*24*60*60);
echo "<br>";

// fechas

echo "<br>";
echo date(DATE_ATOM, mktime(10, 15, 0, 10, 4, 2022));
echo "<br>";
echo date_default_timezone_get();
date_default_timezone_set('Europe/Madrid');
echo "<br>";
echo date_default_timezone_get();
echo "<p>fecha de hoy</p>";
echo date("D M Y");
echo "<br>";
echo date("d m Y h:m:s O");
echo "<br>";
echo strtotime("now");
echo "<br>";
echo date("y m d");
echo "<br>";
echo date("d m y");
echo "<p>Diferencia entre fechas</p>";
$primera = mktime(0,0,0,10,11,1994);
$segunda = strtotime("2022-10-04");
$dif = $segunda - $primera;
echo "Diferencia: " . $dif;
$anos = $dif / (60*60*24*365);
echo "<br>";
echo "los años que pasaron son: " . $anos;
$fecha1 = new dateTime("1994-10-11");
$fecha2 = new dateTime();
$intervalo = $fecha2->diff($fecha1);
echo "<br>";
echo "<p>Años que han pasado mediante dateTime:";
echo "<br>Años: " .$intervalo->y. " meses: " .$intervalo->m. " dias: " .$intervalo->d;

