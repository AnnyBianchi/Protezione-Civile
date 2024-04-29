<?php
//includo i dati di accesso al DB
include('daticonnessione.php');
//creo la connessione
$conn= new mysqli($HOSTDB,$USERDB,$PASSDB,$NAMEDB);
//controllo della connessione
if($conn==null && $cn->connect_error){
  $_SESSION["msg"]="Errore della connessione.";
  header("Location: errore.php");
}
//creazione della query
$sql="SELECT * from idranti WHERE ID_idrante= ?";
$stmt1 = $conn->prepare($sql);
if(!($stmt1)){
    //errore incluso in una sessione
    $_SESSION["msg"] = "Errore nello statement.";
    header("location: errore.php");
  }
  else
  {
    //preparazione allo statement
    $ID=$_POST['ID'];
    $stmt1->bind_param("i",$ID);

    //esecuzione dello statement (con controllo)
    if(($stmt1->execute()===true)){
        //righe non presenti, segnalazione
        $_SESSION["errore"]="erroe nell'esecuione della query";
        header("Location/errore.php");    
      }
     
      
  }




?>
<!doctype html>
<html lang="en">

<head>
  <title>Inserimento idranti</title>
  
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
  
  <div  class="h1"><h1>Inserimento idranti</h1></div>
  
  
		<form action = "<?php $_SERVER['PHP_SELF']?>" method="post" name="scheda" class="multi-range-field my-5 pb-5">
			<!--Inserimento nome tramite caselle di testo-->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text grouptext1"><div ><h3>Coordinata x:</h3></div></span>
				</div>
				<input type="text" class="input" name="txtCoordinatax"  placeholder="Inserisci le coordinate x" required> 
            </div>
		  
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text grouptext1"><div><h3>Coordinata y:</h3></div></span>
				</div>
				<input type="text" class="input" name="txtCoordinatay" placeholder="Inserisci le coordinate y" required>
			</div>
		  
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text grouptext1"><div><h3>Descrizione:</h3></div></span>
				</div>
				<input type="text" class="input" name="txtDescrizione"  placeholder="Inserisci la descrizione" required>
			</div>
		  
			<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text grouptext1"><div><h3>tipo attacco:</h3></div></span>
					</div>
					<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
				  <label class="form-check-label" for="flexCheckDefault">
					Uni45
				  </label>
				</div><br><br>
							<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
				  <label class="form-check-label" for="flexCheckDefault">
					Uni70
				  </label>
				</div>
		  
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text grouptext1"><div><h3>Stato idrante:</h3></div></span>
				</div>
							<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
				  <label class="form-check-label" for="flexCheckDefault">
					Funzionante
				  </label>
				</div><br><br>
							<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
				  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
				  <label class="form-check-label" for="flexCheckDefault">
					Non Funzionante
				  </label>
				</div>
			  
			</div>
			
			</div>
		  
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text grouptext1"><div><h3>Accessibilità idrante:</h3></div></span>
				</div>
				<input type="text" class="input" name="Acc" placeholder="Descrizione Accessibilità">
			</div>


          <button class="button type1"><span class="btn-txt">Invia dati</span></button>
		  
        </form>
  
  </main>
  
  <footer>
    <!-- place footer here -->
  </footer>
  
</body>

</html>


            <input type="text" class="form-control" name="nome" value="<?= isset($nome) ? htmlspecialchars($nome) : '' ?>" require>
            <input type="text" class="form-control" name="anno" value="<?= isset($anno) ? htmlspecialchars($anno) : '' ?>" require>

        		