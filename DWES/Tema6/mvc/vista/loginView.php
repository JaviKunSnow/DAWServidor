<?php

    if(isset($_SESSION['error'])) {
        echo $_SESSION['error'];
    }

?>
<form action="./index.php" method="post">
    <div class="mb-3">
      <label for="" class="form-label">Usuario: </label>
      <input type="text" class="form-control" name="user" id="user" aria-describedby="helpId">
      <label for="pass" class="form-label">Pass: </label>
      <input type="password" class="form-control" name="pass" id="pass" aria-describedby="helpId">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>