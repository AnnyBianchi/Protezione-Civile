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
	$res=$conn->query($sql);


    //esecuzione dello statement (con controllo)
    if(($res->num_rows>0)){
		while($obj=$res->fetch_object())
		{
			$_SESSION["Coordinata x"]=$obj->Coordinata_x;
			$_SESSION["Coordinata y"]=$obj->Coordinata_Y;
			$_SESSION["Descrizione"]=$obj->Descrizione;
			$_SESSION["accessibilità"]=$obj->accessibilità;
			$_SESSION["id_stato"]=$obj->id_stato;
			$_SESSION["id_citta"]=$obj->id_citta;
		}
		
    }
     
      
  }




?>
