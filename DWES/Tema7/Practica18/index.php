<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
  </header>
  <main>
    <form action="./ver.php" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Ciudad</label>
            <select class="form-select form-select-lg" name="ciudad" id="ciudad">
                <option selected>Select one</option>
                <option value="zamora">Zamora</option>
                <option value="Le%C3%B3n">Leon</option>
                <option value="salamanca">Salamanca</option>
                <option value="palencia">Palencia</option>
                <option value="soria">Soria</option>
                <option value="segovia">Segovia</option>
                <option value="avila">Avila</option>
                <option value="valladolid">Valladolid</option>
            </select>
        </div>
        <div class="mb-3">
          <button name="enviar" class="btn btn-primary" type="submit">Enviar</button>
        </div>
    </form>
  </main>
  <footer>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>