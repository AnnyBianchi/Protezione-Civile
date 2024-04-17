<?php
    //avvio la memoria di sessione
    session_start();

    if (isset($_POST["user"]) && isset($_POST["pw"]))
    {
        $ut=$_POST["user"];
        $pw=$_POST["pw"];
        include("daticonnessione.php");

        $cn= new mysqli($HOSTDB,$USERDB,$PASSDB,$NAMEDB);
        
        //controllo se la connessione è fallita
        if($cn==null || $cn->connect_error)
        {
            $_SESSION["Errore"]="Attenzione errore di connessione al Database:". $cn->connect_error;
            header('Location:login.php');
            exit();   
        }

        $sql="SELECT password, tipologiaUtente, ID_operatore 
        FROM operatori 
        WHERE username = ?";
        
        if($stmt = $cn->prepare($sql)){
            $filtro1 = $ut;
            $stmt->bind_param("s",$filtro1);
            if($stmt->execute()===true){    
                $res = $stmt->get_result();
                if($res->num_rows>0){
                    $obj = $res->fetch_object();
                    if(password_verify($pw,$obj->password) == true){
                        $_SESSION["idOperatore"] = $obj->ID_operatore;
                        $_SESSION["tipoUtente"] = $obj->tipologiaUtente;
                        header("Location:home.php");
                        exit();
                    }
                    else{
                        $_SESSION["Errore"] = "La password inserita non è corretta.";
                        header("Location:login.php");
                        die();
                    }
                }
                else{
                    $_SESSION["Errore"] = "Non è stato trovato alcun account con questo username.";
                    header("Location:login.php");
                    die();
                }
            }
            else{
                $_SESSION["Errore"] = "Errore nell'else dell'execute";
                header("Location:login.php");
                die();
            }
        }
        else{
            $_SESSION["Errore"] = "Errore nell'else del prepare";
            header("Location:login.php");
            die();
        }
    }
?>
