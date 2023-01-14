<?php

function formularioProducto() {
    
    try {

        if(enviado()){
            if($_REQUEST["opc"] == "mod") {
                actualizarProducto();
                ticketAlbaran();
            } else {
                nuevoProducto();
            }
            header("location: ./leerBD.php?tabla=".$_REQUEST["tabla"]);

        } else {

            if($_REQUEST["opc"] == "mod") {
                $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname='.BD, USR, PAS);
                $sql = 'select * from producto where cod_producto = '.$_REQUEST["numeroID"].'';
        
                $resultado= $conexion->query($sql);
                
                while ($fila = $resultado->fetch(PDO::FETCH_BOTH)) {
                    $nombre = $fila["nombre"];
                    $descripcion = $fila["descripcion"];
                    $foto = $fila["foto"];
                    $precio = $fila["precio"];
                    $stock = $fila["stock"];
                }
            }

            ?>
            <main class="my-form" style="paddint-top: 100px;">
            <section class="container">
            <section class="row justify-content-center justify-items-center">
                <section class="col-md-8">
                        <section class="card">
                            <section class="card-header text-center">PRODUCTO</section>
                            <section class="card-body bg-dark text-white">
                                <form action="editaBD.php" method="post">
                                    <input type="hidden" name="tabla" value="<?php
                                        echo $_REQUEST["tabla"];
                                    ?>">
                                    <input type="hidden" name="opc" value="<?php
                                        echo $_REQUEST["opc"];
                                    ?>">
                                    <input type="hidden" name="cod_producto" value="<?php
                                        echo $_REQUEST["numeroID"];
                                    ?>">
                                    <?php
                                        if($_REQUEST["opc"] == "mod") {
                                            ?>
                                                <input type="hidden" name="numeroID" value="<?php
                                                    echo $_REQUEST["opc"];
                                                ?>">
                                            <?php
                                        }
                                    ?>
                                    <section class="form-group row mb-2">
                                        <label for="full_name" class="col-md-4 col-form-label text-md-right">Nombre:</label>
                                        <section class="col-md-6">
                                            <input type="text" name="nombreP" id="nombreP" class="form-control" value="<?php
                                                echo $nombre;
                                            ?>" <?php
                                            if($_REQUEST["opc"] == "mod") {
                                                echo "disabled";
                                            }?>>
                                        </section>
                                    </section>
    
                                    <section class="form-group row mb-2">
                                        <label for="email_address" class="col-md-4 col-form-label text-md-right">Descripcion:</label>
                                        <section class="col-md-6">
                                            <textarea name="desc" id="desc" rows="10" cols="30"><?php
                                                if($_REQUEST["opc"] == "mod") {
                                                    echo $descripcion;
                                                }
                                            ?>
                                            </textarea>
                                        </section>
                                    </section>
    
                                    <section class="form-group row mb-2">
                                        <label for="user_name" class="col-md-4 col-form-label text-md-right">foto:</label>
                                        <section class="col-md-6">
                                            <?php
                                                if($_REQUEST["opc"] == "mod") {
                                                    ?>
                                                    <input type="text" name="foto" id="foto" class="form-control" value="<?php
                                                        echo $foto;
                                                    ?>" disabled>
                                                    <?php
                                                } else if($_REQUEST["opc"] == "ins") {
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
                                                echo $precio;
                                                ?>" <?php
                                                if($_REQUEST["opc"] == "mod") {
                                                    echo "disabled";
                                                }?>>
                                        </section>
                                    </section>
    
                                    <section class="form-group row mb-2">
                                        <label for="present_address" class="col-md-4 col-form-label text-md-right">Stock:</label>
                                        <section class="col-md-6">
                                            <input type="text" name="stockP" id="stockP" class="form-control" value="<?php
                                                echo $stock;
                                                ?>">
                                        </section>
                                    </section>
    
                                        <section class="col-md-6 offset-md-4">
                                            <input type="submit" name="enviar" value="Registro" class="btn btn-outline-warning">
                                        </section>
                                    </section>
                                </form>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
            <?php
    
        }

    } catch (Exception $ex) {
        if ($ex->getCode() == 1049) {
            echo "<span style='color: red;'>La base de datos no existe.</span>";
        }
        if ($ex->getCode() == 1045) {
            echo "<span style='color: red;'>El nombre de usuario o la contraseña no es correcto.</span>";
        }
        if ($ex->getCode() == 2002) {
            echo "<span style='color: red;'>Se acabo el tiempo de espera, no hemos podido establecer la conexion.</span>";
        }
    }



}

function formularioVentas() {
    
    try {

        if($_REQUEST["opc"] == "elm"){
        eliminarVenta();
        header("location: ./leerBD.php?tabla=".$_REQUEST["tabla"]);
        }

        if(enviado()){
            if($_REQUEST["opc"] == "mod") {
                actualizarVenta();
            }
            header("location: ./leerBD.php?tabla=".$_REQUEST["tabla"]);

        } else {

        
            if($_REQUEST["opc"] == "mod") {
                $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname='.BD, USR, PAS);
                $sql = 'select * from ventas where id_venta = '.$_REQUEST["numeroID"].'';
        
                $resultado= $conexion->query($sql);
                
                while ($fila = $resultado->fetch(PDO::FETCH_BOTH)) {
                    $usuario = $fila["usuario"];
                    $fecha = $fila["fechacomp"];
                    $cod_producto = $fila["cod_producto"];
                    $cantidad = $fila["cantidad"];
                    $precio = $fila["precio_total"];
                }
            }

            ?>
            <main class="my-form" style="paddint-top: 100px;">
            <section class="container">
            <section class="row justify-content-center justify-items-center">
                <section class="col-md-8">
                        <section class="card">
                            <section class="card-header text-center">VENTAS</section>
                            <section class="card-body bg-dark text-white">
                                <form action="editaBD.php" method="post">
                                    <input type="hidden" name="tabla" value="<?php
                                        echo $_REQUEST["tabla"];
                                    ?>">
                                    <input type="hidden" name="opc" value="<?php
                                        echo $_REQUEST["opc"];
                                    ?>">
                                    <input type="hidden" name="cod_producto" value="<?php
                                        echo $_REQUEST["numeroID"];
                                    ?>">
                                    <?php
                                        if($_REQUEST["opc"] == "mod") {
                                        ?>
                                            <input type="hidden" name="numeroID" value="<?php
                                                echo $_REQUEST["opc"];
                                            ?>">
                                        <?php
                                        }
                                    ?>
                                    <section class="form-group row mb-2">
                                        <label for="full_name" class="col-md-4 col-form-label text-md-right">Usuario:</label>
                                        <section class="col-md-6">
                                            <input type="text" name="userV" id="userV" class="form-control" value="<?php
                                                echo $usuario;
                                            ?>">
                                        </section>
                                    </section>
    
                                    <section class="form-group row mb-2">
                                        <label for="email_address" class="col-md-4 col-form-label text-md-right">Fecha de compra:</label>
                                        <section class="col-md-6">
                                        <input type="text" name="fecha" id="fecha" class="form-control" value="<?php
                                            echo $fecha;
                                        ?>">
                                        </section>
                                        <?php

                                        if(enviado()) {
                                            if(vacio("fecha")){
                                                echo "<span style='color: red;'><-- Rellene la fecha</span>";
                                            } else if(!compFecha("fecha")) {
                                                echo "<span style='color: red;'><-- La fecha no es correcta</span>";
                                            }
                                        }

                                        ?>
                                    </section>
    
                                    <section class="form-group row mb-2">
                                        <label for="user_name" class="col-md-4 col-form-label text-md-right">codigo del producto:</label>
                                        <section class="col-md-6">
                                            <input type="number" name="cod_producto" id="cod_producto" class="form-control" value="<?php
                                                echo $cod_producto;
                                            ?>">
                                        </section>
                                    </section>

                                    <section class="form-group row mb-2">
                                        <label for="present_address" class="col-md-4 col-form-label text-md-right">Cantidad:</label>
                                        <section class="col-md-6">
                                            <input type="number" name="stockV" id="stockV" class="form-control" value="<?php
                                                echo $stock;
                                                ?>">
                                        </section>
                                    </section>
    
                                    <section class="form-group row mb-2">
                                        <label for="phone_number" class="col-md-4 col-form-label text-md-right">Precio total:</label>
                                        <section class="col-md-6">
                                            <input type="number" id="precioV" name="precioV" class="form-control" value="<?php
                                                echo $precio;
                                                ?>">
                                        </section>
                                    </section>
    
                                        <section class="col-md-6 offset-md-4">
                                            <input type="submit" name="enviar" value="Registro" class="btn btn-outline-warning">
                                        </section>
                                    </section>
                                </form>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
            <?php
    
        }

    } catch (Exception $ex) {
        if ($ex->getCode() == 1049) {
            echo "<span style='color: red;'>La base de datos no existe.</span>";
        }
        if ($ex->getCode() == 1045) {
            echo "<span style='color: red;'>El nombre de usuario o la contraseña no es correcto.</span>";
        }
        if ($ex->getCode() == 2002) {
            echo "<span style='color: red;'>Se acabo el tiempo de espera, no hemos podido establecer la conexion.</span>";
        }
    }



}

function formularioAlbaranes() {
    
    try {

        if($_REQUEST["opc"] == "elm"){
        eliminarAlbaranes();
        header("location: ./leerBD.php?tabla=".$_REQUEST["tabla"]);
        }

        if(enviado()){
            if($_REQUEST["opc"] == "mod") {
                actualizarAlbaranes();
            }
            header("location: ./leerBD.php?tabla=".$_REQUEST["tabla"]);

        } else {

        
            if($_REQUEST["opc"] == "mod") {
                $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname='.BD, USR, PAS);
                $sql = 'select * from albaranes where id_albaran = '.$_REQUEST["numeroID"].'';
        
                $resultado= $conexion->query($sql);
                
                while ($fila = $resultado->fetch(PDO::FETCH_BOTH)) {
                    $usuario = $fila["usuario"];
                    $fecha = $fila["fechaalb"];
                    $cod_producto = $fila["cod_producto"];
                    $cantidad = $fila["cantidad"];
                }
            }

            ?>
            <main class="my-form" style="paddint-top: 100px;">
            <section class="container">
            <section class="row justify-content-center justify-items-center">
                <section class="col-md-8">
                        <section class="card">
                            <section class="card-header text-center">ALBARANES</section>
                            <section class="card-body bg-dark text-white">
                                <form action="editaBD.php" method="post">
                                    <input type="hidden" name="tabla" value="<?php
                                        echo $_REQUEST["tabla"];
                                    ?>">
                                    <input type="hidden" name="opc" value="<?php
                                        echo $_REQUEST["opc"];
                                    ?>">
                                    <input type="hidden" name="cod_producto" value="<?php
                                        echo $_REQUEST["numeroID"];
                                    ?>">
                                    <?php
                                        if($_REQUEST["opc"] == "mod") {
                                            ?>
                                                <input type="hidden" name="numeroID" value="<?php
                                                    echo $_REQUEST["opc"];
                                                ?>">
                                            <?php
                                        }
                                    ?>
                                    <section class="form-group row mb-2">
                                        <label for="full_name" class="col-md-4 col-form-label text-md-right">Usuario:</label>
                                        <section class="col-md-6">
                                            <input type="text" name="userA" id="userA" class="form-control" value="<?php
                                                echo $usuario;
                                            ?>">
                                        </section>
                                    </section>
    
                                    <section class="form-group row mb-2">
                                        <label for="email_address" class="col-md-4 col-form-label text-md-right">Fecha de Albaran:</label>
                                        <section class="col-md-6">
                                        <input type="text" name="fecha" id="fecha" class="form-control" value="<?php
                                            echo $fecha;
                                        ?>">
                                        </section>
                                        <?php

                                        if(enviado()) {
                                            if(vacio("fecha")){
                                                echo "<span style='color: red;'><-- Rellene la fecha</span>";
                                            } else if(!compFecha("fecha")) {
                                                echo "<span style='color: red;'><-- La fecha no es correcta</span>";
                                            }
                                        }

                                        ?>
                                    </section>
    
                                    <section class="form-group row mb-2">
                                        <label for="user_name" class="col-md-4 col-form-label text-md-right">codigo del producto:</label>
                                        <section class="col-md-6">
                                            <input type="text" name="cod_producto" id="cod_producto" class="form-control" value="<?php
                                                echo $cod_producto;
                                            ?>">
                                        </section>
                                    </section>

                                    <section class="form-group row mb-2">
                                        <label for="present_address" class="col-md-4 col-form-label text-md-right">Cantidad:</label>
                                        <section class="col-md-6">
                                            <input type="text" name="stockA" id="stockA" class="form-control" value="<?php
                                                echo $stock;
                                                ?>">
                                        </section>
                                    </section>

                                        <section class="col-md-6 offset-md-4">
                                            <input type="submit" name="enviar" value="Registro" class="btn btn-outline-warning">
                                        </section>
                                    </section>
                                </form>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
            <?php
    
        }

    } catch (Exception $ex) {
        if ($ex->getCode() == 1049) {
            echo "<span style='color: red;'>La base de datos no existe.</span>";
        }
        if ($ex->getCode() == 1045) {
            echo "<span style='color: red;'>El nombre de usuario o la contraseña no es correcto.</span>";
        }
        if ($ex->getCode() == 2002) {
            echo "<span style='color: red;'>Se acabo el tiempo de espera, no hemos podido establecer la conexion.</span>";
        }
    }



}

?>
