
<?php
session_start();
//appunti:
//mettere i vari errori che si possono verificare in delle sessioni che riportano alla pagina che ci ha chiamato
//da fare con la locate

    if($_POST)
    {
        //vengono passati i dati dell'idrante 
        include("datiConnessione.php");

        $conn = new mysqli($HOSTDB, $USERDB, $PASSDB, $NAMEDB);

        if(!isset($_POST['ID_Idrante']) || $conn->connect_error)
        {
            $_SESSION["msg"]="Errore della connessione.";
            header("Location: errore.php");
        }
        else
        {
            //controllo se sono stati passati i dati in post dalla pagina precendente

            //ottiene la data di oggi
            date_default_timezone_set('Europe/Rome');
            $ora_oggi = date("H:i:s");
            //aggiorna il record nel database
            $sql = "UPDATE idranti SET dataEliminazione = CURRENT_DATE() WHERE ID_Idrante = ?";
            $sql2="SELECT ID_Operazione from tipioperazioni WHERE nome= ?";
            $sql3 = "INSERT INTO gestioni(data, ora, id_operatore, id_operazione, id_idrante) VALUES (CURRENT_DATE(),$ora_oggi,?,?,?)";
            // Preparazione della query SQL
            $stmt1 = $conn->prepare($sql);
            $stmt2 = $conn->prepare($sql2);
            $stmt3 = $conn->prepare($sql3);
            if($stmt1 && $stmt2 && $stmt3)
            {
                $filtro_id = $_POST["ID_Idrante"];
                $stmt1->bind_param("i", $filtro_id);
 
                //esecuzione dello statement con controllo)
                if($stmt1->execute()===true){
                    //esecuzione riuscita
                    $filtro_NomeOperazione="eliminazione";
                    $stmt2->bind_param("s", $filtro_NomeOperazione); 
                    if($stmt2->execute()===true){
                        //estrazione dei risultati
                        $res= $stmt2->get_result();
                        if($res->num_rows>0){ //$res->num_rows>0 non funziona se le righe sno 0
                          //righe presenti, gestione dei risultati
                          $obj=$res->fetch_object();
                          $filtro_IDoperazione=$obj->ID_Operazione;
                          $filtro_operatore = $_SESSION["ID_Operatore"];
                        
                        
                          $stmt3->bind_param("iii", $filtro_IDoperazione, $filtro_operatore, $filtro_id);
                        
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
                else{
                    //errore esecuzione
                    $errore = "Errore nell'esecuzione";
                    $_SESSION["msg"] = $errore;
                    header("location: errore.php");
                }
            }
            else
            {
                //errore incluso in una sessione
                $_SESSION["msg"] = "Errore nello statement.";
                header("location: errore.php");
            }


            unset($obj);
            unset($res);
            $conn->close();

        }

        

        //nella pagina html si chiederà la conferma dell'aggiunta della data di eliminazione
    }   
       
?>    
