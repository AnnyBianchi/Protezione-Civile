<?php
session_start();
$stampa = false;
$messaggio=false;
include("../controlloSession.php");
if($_POST){
  if(controlloSessione()==true)
  {
    if(isset($_POST["nome"]) || isset($_POST["provincia"])){
    $messaggio=true;
    //inclusione dati connessione
    include("../daticonnessione.php");
    //creazione della connessione
    $conn = new mysqli($HOSTDB, $USERDB, $PASSDB, $NAMEDB);
    //controllo della connesione
    if($conn == null || $conn->connect_error)
    {
        header("Location: Errore.php");
        exit();
    }
    // impostazione stringa query con placeholder
    $sql = "SELECT citta.nome, coordinataX, coordinataY FROM idranti INNER JOIN citta ON idranti.id_citta = citta.ID_Citta WHERE citta.nome = ? or citta.provincia = ? and idranti.id_stato = ?";
    //impostazione prepared statement 
      if($stmt = $conn->prepare($sql))
      {
        //collegamento (associazione) dei parametri
        $filtro = $_POST["nome"];
        $filtro2 =$_POST["provincia"];
        $filtro3 = intval($_POST["attivo"]);
      
        $stmt->bind_param("ssi", $filtro, $filtro2, $filtro3);

        
      //esecuzione dello statement (con controllo)
      if($stmt->execute() === TRUE){
        //estrazione dei risultati 
        $res = $stmt->get_result();
        if($res->num_rows>0){
          //righe presenti, gestione dei risultati
          $tabella="<table> <thead> <tr><th> Citta </th><th> Coordinata x </th> <th> Coordinata Y </th> </tr> </thead> <tbody>";
          $stampa = true;
          while($obj=$res->fetch_object()){
            $tabella.= "<tr> <td>".$obj->nome."</td> <td>".$obj->coordinataX."</td> <td> ".$obj->coordinataY." </td> </tr>";
          }
          $tabella.="</tbody></table>";
        }
        else{
          //righe non presenti
          $stampa = false;
        }
      }
      //chiusura connessione e rilascio delle risorse
      unset($obj);
      unset($res);
      $conn->close(); 
    }
  }
 }
 else{
  header("Location:login.php");
  exit();
 }
}
  
  
?>

<!doctype html>
<html lang="en">

<head>
  <title>Sito Protezione Civile</title>
  
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
	
</head>

<body>
  <header>
   
  </header>
  
  <main>
  
  <h1> DB Protezione Civile </h1>
  
  <form action = "<?php $_SERVER['PHP_SELF']?>" method="post" name="scheda" class="multi-range-field my-5 pb-5">

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text grouptext1"> Nome della città </span>
            </div>
            <input type="text" class="form-control" name="nome" placeholder="Inserisci il nome della città" >
            
          </div>

        
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text grouptext1">Provincia</span>
            </div>
            <input type = "text" class="form-control" name="provincia" placeholder="Inserisci la provincia" >
          </div>

          <label>Stato idrante:</label>

          <select name="attivo" id="attivo">
            <option value="1">Attivo</option>
            <option value="0">Inattivo</option>
          </select>

          <input type="submit" class="btn btn-primary" value="Ricerca dati">
		  
        </form>
<form action = "../gestioneSegnalazioni.php" method="post" name="scheda" class="multi-range-field my-5 pb-5">

  <input type="submit" class="btn btn-primary" value="Gestione Segnalazioni">

</form>

<?php
if($messaggio==true){
  echo "<h3>Risultati ricerca</h3>";
  if($stampa == true){
    //STAMPA DEI RISULTATI
    echo $tabella;
  }
  else{
    //SEGNALAZIONE DATI NON PRESENTI
    echo "<div class='alert alert-danger' role='alert'>Dati non presenti</div>";
    var_dump(($_POST));
  }
}
?>

<form action = "../gestioneIdranti/inserimento_idranti.html" method="post" name="scheda" class="multi-range-field my-5 pb-5">

  <input type="submit" class="btn btn-primary" value="Inserisci Idrante">

</form>
<a href="logout.php">
        <button style="font-size: 300%; font-family: 'goldplayBold';">Fai il logout</button>
    </a>
        
  
		

  
  
  
  </main>
  
</body>

</html>