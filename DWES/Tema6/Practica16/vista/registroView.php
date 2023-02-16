<?
    if(isset($_SESSION["error"])) {
        echo $_SESSION["error"];
    }
?>
<?
if ($_SESSION["registrado"]) { ?>
    <main class="m-0 vh-100 row justify-content-center align-items-center">
        <section class="container p-3 bg-dark text-light text-center" style="width: 400px; height: 200px;">
            <h2>registro completado!</h2>
            <form action="./index.php" method="post">
                <input type="submit" name="login" class='btn btn-sm btn-outline-warning' value="iniciar sesion">
            </form>
        </section>
    </main>
<?
} else { ?>
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
                                        <input type="text" name="user" id="user" class="form-control">
                                    </section>
                                    <?php

                                    if(enviadoRegistro()) {
                                        if(vacio("user")){
                                            echo "<span style='color: red;'><-- Rellene el nombre de usuario</span>";
                                        }
                                    }

                                    ?>
                                </section>

                                <section class="form-group row mb-2">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-mail:</label>
                                    <section class="col-md-6">
                                        <input type="text" name="mail" id="mail" class="form-control">
                                    </section>
                                    <?php

                                    if(enviadoRegistro()) {
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
                                        <input type="text" name="nombre" id="nombre" class="form-control">
                                    </section>
                                    <?php

                                    if(enviadoRegistro()) {
                                        if(vacio("nombre")){
                                            echo "<span style='color: red;'><-- Rellene el nombre</span>";
                                        }
                                    }

                                    ?>
                                </section>

                                <section class="form-group row mb-2">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña:</label>
                                    <section class="col-md-6">
                                        <input type="password" id="pass" name="pass" class="form-control">
                                    </section>
                                    <?php

                                    if(enviadoRegistro()) {
                                        if(vacio("pass")){
                                            echo "<span style='color: red;'><-- Rellene la contraseña</span>";
                                        } else if(!compPass("pass")) {
                                            echo "<span style='color: red;'><-- La contraseña no cumple los requisitos</span>";
                                        }
                                    }

                                    ?>
                                </section>

                                <section class="form-group row mb-2">
                                    <label for="fecha" class="col-md-4 col-form-label text-md-right">Fecha de nacimiento:</label>
                                    <section class="col-md-6">
                                        <input type="text" name="fecha" id="fecha" class="form-control">
                                    </section>
                                    <?php

                                    if(enviadoRegistro()) {
                                        if(vacio("fecha")){
                                            echo "<span style='color: red;'><-- Rellene la fecha</span>";
                                        } else if(!compFecha("fecha")) {
                                            echo "<span style='color: red;'><-- La fecha no es correcta</span>";
                                        }
                                    }

                                    ?>
                                </section>

                                <section class="form-group row mb-2">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Elige una opcion de perfil:</label>
                                    <section class="col-md-6">
                                    <select name="rol" id="selector">
                                        <option value="0">Seleccione una opción</option>
                                        <option value="ADM">Administrador</option>
                                        <option value="MOD">Moderador</option>
                                        <option value="NOR">Usuario normal</option>
                                    </select>
                                    </section>
                                    <?php
                                    if(existe("rol") && $_REQUEST["rol"] == 0){
                                        echo "<span style='color: red;'><-- No has elegido tipo de perfil</span>";
                                    }
                                    ?>
                                </section>
                                    <section class="col-md-6 offset-md-4">
                                        <input type="submit" name="registrar" value="Registro" class="btn btn-outline-warning">
                                    </section>
                                </section>
                            </form>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </main>
    <?
}
?>