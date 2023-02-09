<h1>admin</h1>
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">fecha</th>
                <th scope="col">id User</th>
                <th scope="col">n1</th>
                <th scope="col">n2</th>
                <th scope="col">n3</th>
                <th scope="col">n4</th>
                <th scope="col">n5</th>
            </tr>
        </thead>
        <tbody>
        <?php
                foreach($lista as $value) {
                    ?>
                        <tr class="">
                            <td scope="row"><?echo $value->id?></td>
                            <td scope="row"><?echo $value->fecha?></td>
                            <td scope="row"><?echo $value->iduser?></td>
                            <td scope="row"><?echo $value->n1?></td>
                            <td scope="row"><?echo $value->n2?></td>
                            <td scope="row"><?echo $value->n3?></td>
                            <td scope="row"><?echo $value->n4?></td>
                            <td scope="row"><?echo $value->n5?></td>
                        </tr>
                    <?
                }
            ?>
        </tbody>
    </table>
    <section>
        <form action="" method="post">
            <?  
                if(!$_SESSION["sorteo"]){?>
                    <input type="submit" name="generar" value="generar sorteo">
                <?
                } else if($_SESSION["sorteo"]) {?>
                    <p>Sorteo generado: </p>
                    
                <?
                }
            ?>
            
        </form>
    </section>
</div>
