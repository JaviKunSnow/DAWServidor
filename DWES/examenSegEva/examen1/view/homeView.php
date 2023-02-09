<form action="./index.php" method="post">
    <section><?
        if($_SESSION["apuesta"]) {
            echo "Apuesta realizada";
        } else if(isset($_SESSION["error"])){
            echo $_SESSION["error"];
        }
    ?>
    </section>
    <section><?
        foreach(range(1, 50) as $num) {?>
            <input type="checkbox" name="check[]" id="check[]" value="<?echo $num?>" <?
                if(isset($arrayChecks)) {
                    if(in_array($num, $arrayChecks)) {
                        echo "checked";
                    }
                }
                
            ?>>
            <label for="check[]"><?echo $num?></label>
        <?
        }
    ?>
    </section>
    <section><?
        if(!$_SESSION["enviado"] && !$_SESSION["apuesta"]) {?>
            <input type="submit" name="enviar" value="enviar">
        <?
        } else {?>
            <input type="submit" name="modificar" value="modificar">
        <?
        }
    ?>
    </section>
</form>