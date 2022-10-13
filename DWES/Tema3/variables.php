<h2>Nave Espacial</h2>
<?php
$a = 5;
$b = 2;

var_dump($a<=>$b);

$a = 5;
$b = 2;

var_dump($a & $b);

$a = 5;
$b = 2;

var_dump($a << $b);
?>

<h2>Bucles</h2>
<?php
for($i=0; $i < 10; $i++){
    if($i == 5){
        continue;
    }
    echo "<br>" .$i;
    
}

//while

$a = 1;
do{
    echo "<br>" .$a;
    $a++;
}while ($a < 5);

echo "<br>";
// piramide con for

echo "<p>Piramide de asteriscos con For</p>";

$variable = implode($_GET);

for($i = 1; $i <= $variable; $i++){
    for($blanco = 1; $blanco <= $variable-$i; $blanco++){
        echo "&nbsp;&nbsp;";
    }

    for($astericos=1; $astericos <= ($i*2) - 1; $astericos++){
        echo "*";
    }
    echo "<br>";   
}

?>