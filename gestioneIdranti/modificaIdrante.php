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
$sql="UPDATE idranti SET stato=?,descrizione=?,accessibilità=?,coordinataX=?,coordinataY=?,ia.id_Attacco=? FROM idranti as i inner join idrante_attacco as ia on i.ID_idrante=ia.id_idrante where ID_Idrante=?";
$sql2="SELECT ID_Operazione from tipioperazioni WHERE nome= ?";
$sql3 = "INSERT INTO gestioni(data, ora, id_operatore, id_operazione, id_idrante) VALUES (CURRENT_DATE(),$ora_oggi,?,?,?)";
$stmt1 = $conn->prepare($sql);
$stmt2 = $conn->prepare($sql2);
$stmt3 = $conn->prepare($sql3);
if(!($stmt1 && $stmt2 && $stmt3)){
    //errore incluso in una sessione
    $_SESSION["msg"] = "Errore nello statement.";
    header("location: errore.php");
  }
  else
  {
    //preparazione allo statement
    $stato=$_POST['stato'];
    $descrizione=$_POST['descrizione'];
    $accessibilità=$_POST['accessibilità'];
    $coordinataX=$_POST['coordinataX'];
    $coordinataY=$_POST['coordinataY'];
    $attacco=$_POST['attacco'];
    $ID=$_POST['ID'];
    $stmt1->bind_param("issssii",$stato,$descrizione,$accessibilità,$coordinataX,$coordinataY,$attacco,$ID);

    //esecuzione dello statement (con controllo)
    if(!($stmt1->execute()===true)){
        //righe non presenti, segnalazione
        $_SESSION["errore"]="erroe nell'esecuione della query";
        header("Location/errore.php");    
      }
      else{
        //esecuzione riuscita
        $filtro_NomeOperazione="modifica";
        $stmt2->bind_param("s", $filtro_NomeOperazione); 
        if($stmt2->execute()===true){
            //estrazione dei risultati
            $res= $stmt2->get_result();
            if($res->num_rows>0){ //$res->num_rows>0 non funziona se le righe sno 0
              //righe presenti, gestione dei risultati
              $obj=$res->fetch_object();
              $filtro_IDoperazione=$obj->ID_Operazione;
              $filtro_operatore = $_SESSION["ID_Operatore"];
            
            
              $stmt3->bind_param("iii", $filtro_IDoperazione, $filtro_operatore, $ID);
            
              if($stmt3->execute()===true){
                //torna una sessione con un risultato effettivo
                $_SESSION["msg"] = "Record modificato con successo.";
                header("location: RicercaIdranti.php");
              }
              else{
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
      
  }




?>