<section class="form-signin w-100 m-auto text-center">
    <form action="../funciones/validarBD.php" method="post">
        <img class="mb-4" src="../img/logosinfondo.svg" alt="" width="100" height="80">
        <h1 class="h3 mb-3 fw-normal">Iniciar Sesion</h1>
        <section class="form-floating">
            <input type="text" class="form-control" name="user" id="user" placeholder="name@example.com">
            <label for="user">Usuario</label>
        </section>
        <section class="form-floating">
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
            <label for="pass">Contraseña</label>
        </section>
        <button class="w-100 btn btn-lg btn-dark text-white" type="enviar">Iniciar sesion</button>
        <p class="mt-5 mb-3 text-dark">&copy; 2023</p>
    </form>
</section>