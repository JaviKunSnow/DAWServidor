<main>
    <section class="album py-5">
        <section class="container">
            <section class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3'>
                <section class='col'>
                    <section class='card shadow-sm'>
                        <img src='webroot/img/<? echo $producto->foto ?>' width='100%' height='450'>
                        <section class='card-body bg-dark'>
                            <h3 class='h3 text-light'><? echo $producto->nombre ?></h3>
                            <p class='card-text text-light'><? echo $producto->descripcion ?></p>
                            <section class='d-flex justify-content-between align-items-center'>
                                <small class='text-white'><? echo $producto->precio ?>€</small>
                                <section class='btn-group'>
                                    <form action="" method="post">
                                        <input type="hidden" name="cod_producto" value="<? echo $producto->cod_producto ?>">
                                        <input type="hidden" name="cantidad" value="<? echo $producto->precio ?>">
                                            <input type="number" name="stock" class='btn btn-sm btn-outline-warning' min="1" max="<?echo $producto->stock?>">
                                            <input type="submit" name="login" class='btn btn-sm btn-outline-warning' value="Comprar">
                                    </form>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
</main>