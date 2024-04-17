<?php
/*
$messaggio;
if($_POST)
{
	if(	isset($_POST['txtCoordinatax']) && isset($_POST['txtCoordinatay']) && isset($_POST['txtDescrizione']))
	{
		include('');
	}	
	else
	{
		$messaggio="compilare i campi";
	}
}
*/	
?>

<!doctype html>
<html lang="en">

<head>
  <title>MySql Inserimento</title>
  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	
  <!--File dello stile css-->
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="STYLE.css"/>
    

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  
  <main>
  
  <div  class="h1"><h1>DB biciclette - Tabella Produttori - Inserimento</h1></div>

        <!--Inserimento nome tramite caselle di testo-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text grouptext1"><div class="h3"><h3>Coordinata x:</h3></div></span>
				</div>
				<input type="text" class="input" name="txtCoordinatax"  placeholder="<?= isset($nome) ? htmlspecialchars($nome) : 'Inserisci le coordinate x' ?>" required> 
            </div>
		  
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text grouptext1"><div class="h3"><h3>Coordinata y:</h3></div></span>
				</div>
				<input type="text" class="input" name="txtCoordinatay" placeholder="<?= isset($nome) ? htmlspecialchars($nome) : 'Inserisci le coordinate y' ?>" required>
			</div>
		  
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text grouptext1"><div class="h3"><h3>Descrizione:</h3></div></span>
				</div>
				<input type="text" class="input" name="txtDescrizione"  placeholder="<?= isset($nome) ? htmlspecialchars($nome) : 'Inserisci la descrizione' ?>" required>
			</div>
		  
			<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text grouptext1"><div class="h3"><h3>tipo attacco:</h3></div></span>
					</div>
					<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="cbAttacco">
				  <label class="form-check-label" for="flexCheckDefault">
					Uni45
				  </label>
				</div><br><br>
							<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="cbAttacco">
				  <label class="form-check-label" for="flexCheckDefault">
					Uni70
				  </label>
				</div>
		  
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text grouptext1"><div class="h3"><h3>Stato idrante:</h3></div></span>
				</div>
							<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="cbStato">
				  <label class="form-check-label" for="flexCheckDefault">
					Funzionante
				  </label>
				</div><br><br>
							<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="cbStato">
				  <label class="form-check-label" for="flexCheckDefault">
					Non Funzionante
				  </label>
				</div>
			  
			</div>
			
			</div>
		  
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text grouptext1"><div class="h3"><h3>Accessibilità idrante:</h3></div></span>
				</div>
				<input type="text" class="input" name="Acc" placeholder="Inserisci la descrizione" required>
			</div>


          <button class="button type1"><span class="btn-txt">Invia dati</span></button>
		  <?php
			echo $messaggio;
		?>
        </form>
		
  </main>
  
  <footer>
    <!-- place footer here -->
  </footer>
  
</body>
<script type="text/javascript" src="controlloInserimento.js"></script>
</html>