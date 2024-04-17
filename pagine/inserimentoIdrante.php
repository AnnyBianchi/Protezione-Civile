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
//trovo l'ora
//ottiene la data di oggi
date_default_timezone_set('Europe/Rome');
$ora_oggi = date("H:i:s");
//creazione della query
$sql="SELECT ID_Citta from citta where citta.Nome=? ";
$sql1="INSERT INTO idranti(descrizione, accessibilità,  coordinataX, coordinataY, id_citta) VALUES (?,?,?,?,?) ";
$sql1_5="SELECT ID_Idrante FROM idranti order by ID_Idrante DESC limit 1 ";
$sql2="INSERT INTO idrante_attacco(id_Idrante, id_Attacco) VALUES (?,?)";
$sql3="SELECT ID_Operazione from tipioperazioni WHERE nome= ?";
$sql4="INSERT INTO gestioni(data, ora, id_operatore, id_operazione, id_idrante) VALUES (CURRENT_DATE(),$ora_oggi,?,?,?)";
$stmt = $conn->prepare($sql)
$stmt1 = $conn->prepare($sql1);
$stmt2 = $conn->prepare($sql2)
$stmt3 = $conn->prepare($sql3);
$stmt4 = $conn->prepare($sql4);
if(!($stmt && $stmt1 && $stmt2 && $stmt3 && $stmt4))
{
  //errore incluso in una sessione
  $_SESSION["msg"] = "Errore nello statement.";
  header("location: errore.php");
}
else
{
  //preparazione allo statement
  $stato=$_POST['stato'];
  $descrizione=$_POST['descrizione'];
  $accessibilita=$_POST['accessibilità'];
  $coordinataX=$_POST['coordinataX'];
  $coordinataY=$_POST['coordinataY'];
  $citta=$_POST['citta'];
  $id_attacco=$_POST['id_attacco'];
  $id_idrante;
  $id_citta;
  $stmt->bind_param("s",$citta);
  //esecuzione dello statement con controllo)
  if($stmt->execute()===true)
  {
    //estrazione dei risultati
    $res= $stmt->get_result();
    if($res->num_rows>0)
    { //$res->num_rows>0 non funziona se le righe sno 0
      //righe presenti, gestione dei risultati
      $obj=$res->fetch_object();
      $id_citta=$obj->ID_Citta;

      $stmt1->bind_param("sssssi", $descrizione, $accessibilita,$coordinataX,$coordinataY,$id_citta );
      if($stmt1->execute()===true)
      {
        //se esecuzione a buon fine          
        $res =$cn->query($sql1_5);
        if($res->num_rows>0)
        { //$res->num_rows>0 non funziona se le righe sno 0
          //righe presenti, gestione dei risultati
          $obj=$res->fetch_object();
          $id_idrante=$obj->ID_Idrante;
          $stmt2->blind_param("ii",$id_idrante,$id_attacco);
        
          if($stmt2->execute()===true)
          {
            $stmt3->bind_param("s", $filtro_NomeOperazione); 
            if($stmt3->execute()===true){
              //estrazione dei risultati
              $res= $stmt3->get_result();
              if($res->num_rows>0){ //$res->num_rows>0 non funziona se le righe sno 0
                //righe presenti, gestione dei risultati
                $obj=$res->fetch_object();
                $filtro_IDoperazione=$obj->ID_Operazione;
                $filtro_operatore = $_SESSION["ID_Operatore"];
              
              
                $stmt4->bind_param("iii", $filtro_IDoperazione, $filtro_operatore, $id_idrante);
              
                if($stmt4->execute()===true)
                {
                  //torna una sessione con un risultato effettivo
                  $_SESSION["msg"] = "Record modificato con successo.";
                  header("location: RicercaIdranti.php");
                }
                else
                {
                  //errore esecuzione
                  $errore = "Errore nell'esecuzione";
                  $_SESSION["msg"] = $errore;
                  header("location: errore.php");
                }
              
              }
              else{
                //errore perchè non ci sono righe nella tabella
                $errore = "Non sono presenti righe effettive.";
                $_SESSION["msg"] = $errore;
                header("location: errore.php");
              }
            }
            else{
              //errore esecuzione
              $errore = "Errore nell'esecuzione";
              $_SESSION["msg"] = $errore;
              header("location: errore.php");
            }
          }
          else
          {
            //errore esecuzione
            $_SESSION["errore"]="erroe nell'esecuzione";
            header("Location:errore.php");
          }
        }
        else
        {
          //errore perchè non ci sono righe nella tabella
          $errore = "Non sono presenti righe effettive.";
          $_SESSION["msg"] = $errore;
          header("location: errore.php"); 
        }

      }
      else
      {
        //errore esecuzione
        $_SESSION["errore"]="erroe nell'esecuzione";
        header("Location:errore.php");
      }
    }
    else
    {
      //errore perchè non ci sono righe nella tabella
      $errore = "Non sono presenti righe effettive.";
      $_SESSION["msg"] = $errore;
      header("location: errore.php"); 
    }
  }
  else{
    //4.2 righe non presenti, segnalazione 
    $_SESSION["errore"]="erroe nell'esecuzione";
    header("Location:errore.php");
  }
}
  
?>