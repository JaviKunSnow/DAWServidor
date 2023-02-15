<main class="my-form" style="paddint-top: 100px;">
    <section class="container">
        <section class="row justify-content-center justify-items-center">
            <section class="col-md-8">
                <section class="card">
                    <section class="card-header text-center">PRODUCTO</section>
                    <section class="card-body bg-dark text-white">
                        <form action="./index.php" method="post">
                            <input type="hidden" name="cod_producto" value="<?php
                            if($_SESSION['accionProducto'] == 'editar'){
                                echo $_SESSION['producto'];
                            }
                            ?>">
                            <section class="form-group row mb-2">
                                <label for="full_name" class="col-md-4 col-form-label text-md-right">Nombre:</label>
                                <section class="col-md-6">
                                    <input type="text" name="nombreP" id="nombreP" class="form-control" value="<?php
                                    if($_SESSION['accionProducto'] == 'editar'){
                                        echo $producto->nombre;
                                    ?>" disabled<?php
                                    }?>>
                                </section>
                            </section>

                            <section class="form-group row mb-2">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Descripcion:</label>
                                <section class="col-md-6">
                                    <input type="text" name="desc" id="desc" class="form-control" value="<?php
                                    if($_SESSION['accionProducto'] == 'editar'){
                                        echo $producto->descripcion;
                                    }
                                    ?>">
                                </section>
                            </section>

                            <section class="form-group row mb-2">
                                <label for="user_name" class="col-md-4 col-form-label text-md-right">foto:</label>
                                <section class="col-md-6">
                                    <?php
                                    if ($_SESSION['accionProducto'] == 'editar') {
                                    ?>
                                        <input type="text" name="foto" id="foto" class="form-control" value="<?php
                                        echo $producto->foto;
                                        ?>" disabled>
                                    <?php
                                    } else if ($_SESSION['accionProducto'] == 'insertar') {
                                    ?>
                                        <input type="file" class="form-control" id="fichero" name="fichero">
                                    <?php
                                    }
                                    ?>
                                </section>
                            </section>

                            <section class="form-group row mb-2">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">Precio:</label>
                                <section class="col-md-6">
                                    <input type="number" id="precioP" name="precioP" class="form-control" value="<?php
                                    if($_SESSION['accionProducto'] == 'editar'){
                                        echo $producto->precio;
                                    
                                    ?>" disabled<?php
                                    }?>>
                                </section>
                            </section>

                            <section class="form-group row mb-2">
                                <label for="present_address" class="col-md-4 col-form-label text-md-right">Stock:</label>
                                <section class="col-md-6">
                                    <input type="text" name="stockP" id="stockP" class="form-control" value="<?php
                                    if($_SESSION['accionProducto'] == 'editar'){
                                        echo $producto->stock;
                                    
                                    ?>"<?php
                                    }?>>
                                </section>
                            </section>
                            
                            <section class="col-md-6 offset-md-4">
                                <?
                                    if($_SESSION["accionProducto"] == "editar") {?>
                                        <input type="submit" name="enviar" value="Modificar" class="btn btn-outline-warning">
                                    <?
                                    } else {?>
                                        <input type="submit" name="enviar" value="Registro" class="btn btn-outline-warning">
                                    <?
                                    }
                                ?>
                                
                            </section>
                    </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
    </section>
</main>