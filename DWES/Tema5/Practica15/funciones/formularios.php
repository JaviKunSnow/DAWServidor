<?php

function formularioProducto() {
    
    try {
        $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname='.BD, USR, PAS);
        $sql = 'select * from albaranes';

        $resultado= $conexion->query($sql);

        while ($fila = $resultado->fetch(PDO::FETCH_BOTH)) {

            if(compTodo()) {
                actualizarUsuario();
                session_destroy();
                validaUser($_REQUEST["user"], $_REQUEST["pass"]);
                session_start();
                ?>
                <section class="container p-3 bg-dark text-light text-center" style="width: 400px; height: 200px; paddint-top: 100px;">
                    <h2>Cuenta actualizada!</h2>
                    <a href="../index.php" class="btn btn-warning">Volver a Inicio</a>
                </section>
                <?
            } else {
    
            ?>
            <main class="my-form" style="paddint-top: 100px;">
            <section class="container">
            <section class="row justify-content-center justify-items-center">
                <section class="col-md-8">
                        <section class="card">
                            <section class="card-header text-center">REGISTRO</section>
                            <section class="card-body bg-dark text-white">
                                <form action="registro.php" method="post">
                                    <section class="form-group row mb-2">
                                        <label for="full_name" class="col-md-4 col-form-label text-md-right">Descripcion:</label>
                                        <section class="col-md-6">
                                            <input type="text" name="user" id="user" class="form-control" value="<?php
                                                echo $_SESSION["user"];
                                            ?>">
                                        </section>
                                        <?php
    
                                        if(enviado()) {
                                            if(vacio("user")){
                                                echo "<span style='color: red;'><-- Rellene el nombre de usuario</span>";
                                            }
                                        }
    
                                        ?>
                                    </section>
    
                                    <section class="form-group row mb-2">
                                        <label for="email_address" class="col-md-4 col-form-label text-md-right">E-mail:</label>
                                        <section class="col-md-6">
                                            <input type="text" name="mail" id="mail" class="form-control" value="<?php
                                                echo $_SESSION["correo"];
                                            ?>">
                                        </section>
                                        <?php
    
                                        if(enviado()) {
                                            if(vacio("mail")){
                                                echo "<span style='color: red;'><-- Rellene el correo electronico</span>";
                                            } else if(!compMail("mail")) {
                                                echo "<span style='color: red;'><-- El correo electronico no cumple los requisitos</span>";
                                            }
                                        }
    
                                        ?>
                                    </section>
    
                                    <section class="form-group row mb-2">
                                        <label for="user_name" class="col-md-4 col-form-label text-md-right">Nombre:</label>
                                        <section class="col-md-6">
                                            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php
                                                echo $_SESSION["nombre"];
                                            ?>">
                                        </section>
                                        <?php
    
                                        if(enviado()) {
                                            if(vacio("nombre")){
                                                echo "<span style='color: red;'><-- Rellene el nombre</span>";
                                            }
                                        }
    
                                        ?>
                                    </section>
    
                                    <section class="form-group row mb-2">
                                        <label for="phone_number" class="col-md-4 col-form-label text-md-right">Contraseña:</label>
                                        <section class="col-md-6">
                                            <input type="password" id="pass" name="pass" class="form-control" value="<?php
                                                echo $_SESSION["pass"];
                                            ?>">
                                        </section>
                                        <?php
    
                                        if(enviado()) {
                                            if(vacio("pass")){
                                                echo "<span style='color: red;'><-- Rellene la contraseña</span>";
                                            } else if(!compPass("pass")) {
                                                echo "<span style='color: red;'><-- La contraseña no cumple los requisitos</span>";
                                            }
                                        }
    
                                        ?>
                                    </section>
    
                                    <section class="form-group row mb-2">
                                        <label for="present_address" class="col-md-4 col-form-label text-md-right">Fecha de nacimiento:</label>
                                        <section class="col-md-6">
                                            <input type="text" name="fecha" id="fecha" class="form-control" value="<?php
                                                echo $_SESSION["fecha"];
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
                                        <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Elige una opcion:</label>
                                        <section class="col-md-6">
                                        <select name="perfil" id="selector">
                                            <option value="0">Seleccione una opción</option>
                                            <option value="ADM">Administrador</option>
                                            <option value="MOD">Moderador</option>
                                            <option value="NOR">Usuario normal</option>
                                        </select>
                                        </section>
                                        <?php
                                        if(existe("perfil") && $_REQUEST["perfil"] == 0){
                                            echo "<span style='color: red;'><-- La fecha no es correcta</span>";
                                        }
                                        ?>
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