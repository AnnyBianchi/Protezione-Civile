<?php
//includo i dati di accesso al DB
include('daticonnessione.php');
//creo la connessione
$cn= new mysqli($HOSTDB,$USERDB,$PASSDB,$NAMEDB);
//controllo della connessione
if($cn==null && $cn->connect_error){
  die('Errore nel tentativo di connsessione, controllare i termini di accesso');
}
//creazione della query
$sql="SELECT ID_Citta from citta where citta.Nome=? ";
$sql1="INSERT INTO idranti(descrizione, accessibilità,  coordinataX, coordinataY, id_citta) VALUES (?,?,?,?,?),SELECT ID_Idrante FROM idranti order by ID_Idrante DESC limit 1 ";
$sql2="INSERT INTO idrante_attacco(id_Idrante, id_Attacco) VALUES (?,?)";
if(!($stmt=$cn->prepare($sql))){
    die("errore della connesione");
  }
  else
  {
    //preparazione allo statement
    $stato=$_POST['stato'];
    $descrizione=$_POST['descrizione'];
    $accessibilità=$_POST['accessibilità'];
    $coordinataX=$_POST['coordinataX'];
    $coordinataY=$_POST['coordinataY'];
    $citta=$_POST['citta'];
    $id_attacco=$_POST['id_attacco'];
    $id_idrante;
    $id_citta;


    $stmt->bind_param("s",$citta);


    //esecuzione dello statement con controllo)
    if($stmt->execute()===true){
      //estrazione dei risultati
      $res= $stmt->get_result();
      if($res->num_rows>0){ //$res->num_rows>0 non funziona se le righe sno 0
        //righe presenti, gestione dei risultati
        $obj=$res->fetch_object();
        $id_citta=$obj->ID_Citta;

        
        $stmt1->bind_param("sssssi", $descrizione, $accessibilità,$coordinataX,$coordinataY,$id_citta );
        if($stmt1->execute()===true){
          //estrazione dei risultati
          $res= $stmt1->get_result();
          if($res->num_rows>0){ //$res->num_rows>0 non funziona se le righe sno 0
            //righe presenti, gestione dei risultati
            $obj=$res->fetch_object();
            $id_idrante=$obj->ID_Idrante;


            $stmt2->blind_param("ii",$id_idrante,$id_attacco);
      
            if($stmt->execute()===true){
              //estrazione dei risultati
              $res= $stmt->get_result();
              if($res->num_rows>0){ //$res->num_rows>0 non funziona se le righe sno 0
                //righe presenti, gestione dei risultati
                $obj=$res->fetch_object();
              
              }
              else{
                //4.2 righe non presenti, segnalazione 
                $_SESSION["errore"]="erroe nell'inserimento";
                header("Location:errore.php");
                //erroe magico è per scherzare
              }
            }
          
          }
          else{
            //4.2 righe non presenti, segnalazione 
            $_SESSION["errore"]="erroe nell'inserimento";
            header("Location:errore.php");
            //erroe magico è per scherzare
          }
        }
        
      
          }
      else{
        //4.2 righe non presenti, segnalazione 
        $_SESSION["errore"]="erroe nell'inserimento";
        header("Location:errore.php");
        //erroe magico è per scherzare
      }
    }
    

  }
?>