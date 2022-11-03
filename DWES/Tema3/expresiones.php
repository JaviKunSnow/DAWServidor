<?php
    $cadena = 'hoy hace un pesimo dia y hay nubes';
    $patron = '/hace/';
    echo "<br> cadena: ".$cadena." y patron : ".$patron." match ". preg_match($patron,$cadena);
 
    $patron = '/ha./';
    echo "<br> cadena: ".$cadena." y patron : ".$patron." match ". preg_match($patron,$cadena);

    $patron = '/ha.\s/';
    echo "<br> cadena: ".$cadena." y patron : ".$patron." match ". preg_match($patron,$cadena);

    // hoy o hay

    $patron = '/h[o|a]y/';
    echo "<br> cadena: ".$cadena." y patron : ".$patron." match ". preg_match_all($patron,$cadena);

    $patron = '/h[o|a]y/';
    echo "<br> cadena: ".$cadena." y patron : ".$patron." match ". preg_match_all($patron,$cadena);

    $mes = "noviembre";
    $mes1 = "novembera";
    $mes2 = "anov.";

    $patron = '/^nov[.|ember|iembre]+$/';
    echo "<br> cadena: ".$mes." y patron : ".$patron." match ". preg_match($patron,$mes);
    echo "<br> cadena: ".$mes1." y patron : ".$patron." match ". preg_match($patron,$mes1);
    echo "<br> cadena: ".$mes2." y patron : ".$patron." match ". preg_match($patron,$mes2);


    // Con el * de 0 a mas
    //? solo entra el 1 y 2º

    $patron = '/log[0-9]*.log/';
    $cadena = "log.log";
    $cadena1 = "log1.log";
    $cadena2 = "log1244.log";
    echo "<br> cadena: ".$cadena." y patron : ".$patron." match ". preg_match($patron,$cadena);
    echo "<br> cadena: ".$cadena1." y patron : ".$patron." match ". preg_match($patron,$cadena1);
    echo "<br> cadena: ".$cadena2." y patron : ".$patron." match ". preg_match($patron,$cadena2);

    //IBAN valido
    //pais 2 letras + 4 numeros entidad + 4 numeros oficinal + 2 control + 10 cuenta
    $patron = '/^[A-Z]{2}[0-9]{2}(\s)?[0-9]{4}(\s)?[0-9]{4}(\s)?[0-9]{2}(\s)?[0-9]{10}$/';
    $cadena = "ES6621000418401234567891";
    $cadena1 = "ES66 2100 0418 40 1234567891";
    echo "<br> cadena: ".$cadena." y patron : ".$patron." match ". preg_match($patron,$cadena);
    echo "<br> cadena: ".$cadena1." y patron : ".$patron." match ". preg_match($patron,$cadena1);

    $patron = '/^\d{1,3}$/';
    $cadena = "923";
    $cadena1 = "123";
    $cadena2 = "1244";

    echo "<br> cadena: ".$cadena." y patron : ".$patron." match ". preg_match($patron,$cadena);
    echo "<br> cadena: ".$cadena1." y patron : ".$patron." match ". preg_match($patron,$cadena1);
    echo "<br> cadena: ".$cadena2." y patron : ".$patron." match ". preg_match($patron,$cadena2);
    
    // \d es digito y \D es letra

    // match con <html> <h3> <a> </html> </h3>

    // quiero que devuelva donde ha hecho mas

    $patron = '/<\/?\D+\d*>/';
    $cadena = "<html>";
    $cadena1 = "h3>";

    echo "<br> cadena: ".$cadena." y patron : ".$patron." match ". preg_match($patron,$cadena);
    echo "<br> cadena: ".$cadena1." y patron : ".$patron." match ". preg_match($patron,$cadena1);
    ?>