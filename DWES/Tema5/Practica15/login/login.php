<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <header>
        <h1>texteo</h1>
    </header>
    <main>
        <section>
            <form action="./funciones/valida.php" method="post">
                <label for="user">Usuario: </label>
                <input type="text" name="user" id="user">
                <label for="pass">Contraseña: </label>
                <input type="password" name="pass" id="pass">
                <input type="submit" value="enviar" name="enviar">
            </form>
        </section>
    </main>
    <footer>
        <h1>texteo</h1>
    </footer>
</body>