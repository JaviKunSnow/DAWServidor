<h1>INDEX</h1>

<?php

foreach ($arrayProductos as $producto) {
?>
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src='./webroot<?echo $producto->foto?>' alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?echo $producto->nombre?></h5>
            <p class="card-text"><?echo substr($producto->descripcion, 0, 20);?></p>
            <form>
                <input type="hidden" name="cod_producto" value="<?echo $producto->cod_producto?>">
                <input type="submit" href="./index.php" class="btn btn-primary" value="Ver" name="ver">
            </form>
        </div>
    </div>
<?
}

?>