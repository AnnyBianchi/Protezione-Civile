<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
  <form action ="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="scheda" class="multi-range-field my-5 pb-5">

        <!--Inserimento ma non è coretto dovete adattarlo!!!!!!!!!!!!!!!!!!-->
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text grouptext1">Nome Produttore</span>
            </div>
            <input type="text" class="form-control" name="nome" value="<?= isset($nome) ? htmlspecialchars($nome) : '' ?>" require>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text grouptext1">Anno Fondazione</span>
            </div>
            <input type="text" class="form-control" name="anno" value="<?= isset($anno) ? htmlspecialchars($anno) : '' ?>" require>
          </div>
          <input type="text" class="form-control" style="display:none" name="ID" value="<?= isset($ID) ? htmlspecialchars($ID) : '' ?>" >

          <input type="submit" class="btn btn-primary" value="Modifica" style="width:100%" ><br><br>
          <a href="ListaProduttori.php" input type="submit" class="btn btn-primary" value="Torna In Dietro" style="width:100%" >Torna In Dietro</a>
        </form>
        		
   <?php
echo $messaggio;
  ?>
</body>
</html>