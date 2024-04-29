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
$sql="SELECT * FROM idranti where coordinataX=? AND coordinataY=?";
if(!($stmt=$cn->prepare($sql))){
    //errore incluso in una sessione
    $_SESSION["msg"] = "Errore nello statement.";
    header("location: errore.php");
  }
  else
  {
    //preparazione allo statement
    $coordinataX=$_POST['coordinataX'];
    $coordinataY=$_POST['coordinataY'];
    $ID=$_POST['ID_Idrante'];
    $stmt->bind_param("ss",$coordinataX,$coordinataY);

    //esecuzione dello statement (con controllo)
    if(!($stmt->execute()===true))
    {
      //righe non presenti, segnalazione 
      include("inserimento.php");
    }

      
  }




?>