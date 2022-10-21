<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./recibe.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="idNombre">Nombre</label>
            <input type="text" name="nombre" id="idNombre">
        </p>
        <p>
            <label for="idPass">Contraseña</label>
            <input type="password" name="pass" id="idPass">
        </p>
        <p>
            <label for="idMasculino">Masculino</label>
            <input type="radio" name="genero" id="idMasculino" value="Masculino">
            <label for="idFemenino">Femenino</label>
            <input type="radio" name="genero" id="idFemenino" value="femenino">
        </p>
        <p>
            <label for="idDWES">DWES</label>
            <input type="checkbox" name="asig[]" id="idDWES" value="DWES">
            <label for="idDWEC">DWEC</label>
            <input type="checkbox" name="asig[]" id="idDWEC" value="DWEC">          
        </p>
        <p><b>Curso</b>
            <select name="curso" id="idCurso">
                <option value="0">Seleccionar opcion</option>
                <option value="1">Primero</option>
                <option value="2">Segunda</option>
            </select>        
        </p>
        <p>

            <input type="file" name="fichero" id="idFichero">

        </p>
        <input type="submit" value="enviar">
    </form>
</body>
</html>