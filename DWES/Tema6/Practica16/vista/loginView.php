<?
    if(isset($_SESSION["error"])) {
        echo $_SESSION["error"];
    }
?>
<main class="form-signin w-100 m-auto text-center">
    <section class="container bg-dark p-2 rounded">
        <section class="form-signin w-100 m-auto text-center text-white">
            <form action="./index.php" method="post">
                <img class="mb-4" src="webroot/img/logo.jpg" alt="" width="140" height="100">
                <h1 class="h3 mb-3 fw-normal">Iniciar Sesion</h1>
                <section class="form-floating p-1 text-dark">
                    <input type="text" class="form-control" name="user" id="user" placeholder="name@example.com">
                    <label for="user">Usuario:</label>
                </section>
                <section class="form-floating p-1 text-dark">
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                    <label for="pass">Contraseña:</label>
                </section>
                <button class="w-100 btn btn-lg btn-warning text-dark" type="enviar">Iniciar sesion</button>
                <p class="mt-5 mb-3 text-white">&copy; 2023</p>
            </form>
        </section>
    </section>
</main>