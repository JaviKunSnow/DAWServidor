<main class="my-form" style="paddint-top: 100px;">
        <section class="container">
        <section class="row justify-content-center justify-items-center">
            <section class="col-md-8">
                    <section class="card">
                        <section class="card-header text-center">REGISTRO</section>
                        <section class="card-body bg-dark text-white">
                            <form action="./index.php" method="post">
                                <section class="form-group row mb-2">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Usuario:</label>
                                    <section class="col-md-6">
                                        <input type="text" name="user" id="user" class="form-control" value="<?php
                                            echo $usuario->usuario;
                                        ?>" disabled>
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
                                            echo $usuario->correo;
                                        ?>" <? if($_SESSION['accion'] != "editar") {
                                            echo "disabled";
                                        }
                                        ?>>
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
                                            echo $usuario->nombre;
                                        ?>" <? if($_SESSION['accion'] != "editar") {
                                            echo "disabled";
                                        }
                                        ?>>
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
                                            echo $usuario->clave;
                                        ?>" <? if($_SESSION['accion'] != "editar") {
                                            echo "disabled";
                                        }
                                        ?>>
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
                                            echo $usuario->fechanac;
                                        ?>" <? if($_SESSION['accion'] != "editar") {
                                            echo "disabled";
                                        }
                                        ?>>
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
    </main>