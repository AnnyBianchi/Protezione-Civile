<?php
    //inclusione dati connessione
    include("daticonnessione.php");
    //creazione della connessione
    $conn = new mysqli($HOSTDB,$USERDB,$PASSDB,$NAMEDB);
    //preparazione della query
    $sql="SELECT descrizione,accessibilità,dataEliminazione,coordinataX,coordinataY FROM idranti";
    $res=$conn->query($sql);

    if($res-> num_rows > 0)
    {
        $tabella= "<table>
        <thead>
        <tr><th>Descrizione</th></tr><tr><th>Accessibilità</th></tr><tr>data Eliminazione<th></th></tr><tr>Coordinata X<th></th></tr><tr>Coordinata Y<th></th></tr>
        </thead>";
        while($obj=$res->fetch_object())
        {
            $tabella;
            //4.1 righe presenti, gestione dei risultati
            $tabella.="<tr> <td> $obj->descrizione </td>
                         <td> $obj->accessibilità </td> 
                         <td> $obj->dataEliminazione </td> 
                         <td> $obj->coordinataX </td> 
                         <td> $obj->coordinataY </td> 
                         </tr>";
        }
    }
    else
    {
        //4.2 righe non presenti, segnalazione 
        $tabella = "Nessuna bici in archivio";
    }
    //5. chiusura connessione e rilascio delle risorse
    unset($obj);
    unset($res);
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizza dati</title>
</head>
<body>
    
</body>
</html>