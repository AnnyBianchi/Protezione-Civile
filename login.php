<?php
    session_start();
    include("controlloSession.php");
    $messaggio=" ";
    if (isset($_SESSION["Errore"]))
    {
        $messaggio=$_SESSION["Errore"];
        unset($_SESSION["Errore"]);
    }

    if(controlloSessione()==true){
        header("Location: home.php");
        die();
    }

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VVF</title>
    <link rel="stylesheet" href="css/styleLogin.css">
   

    <style>
        
        div.mycontainer {
          width:100%;
          overflow:auto;
        }
        div.mycontainer div {
          width:33%;  
          float:left;
        }
        </style>
        <body>
        
        
        
</head>
<body>

    <div class="mycontainer">
        
        <div style="background-color:white;">
            <center>
                <img src="vvf.png" alt="vvf" width="200" height="200">  <!-- immagine vigili del fuoco -->
            </center>
        </div>
        
        <div style="background-color:white;">
            <br>
            <br>
            <br>
            <h1 style="text-align: center;">LOGIN</h1>
        </div>
        
        <div style="background-color:white;">
            <center>            
                <img src="pc.png" alt="pc" width="200" height="200"> <!-- immagine protezione ciivle -->
            </center>
        </div>
      
      </div>
    <center><form action="controlloLogin.php" method="post" name=""  onsubmit=" return controllaCampi()">
    <div>
        <div class="input_email">
            <label style="font-size: 15pt; align: left;" class="input-group-text grouptext1">Username:</label><br>
            <input type="text" style="width: 300px;" id="user" class="form-control" name="user">
        </div>
    </div>
    <br>
    <div>
        <div class="input_password">
            <label style="font-size: 15pt;" class="input-group-text grouptext1">Password:</label><br>
            <input type="password" style="width: 300px;" id="pw" class="form-control" name="pw">
        </div>
    </div>
    <br>
    <input type="submit" class="btn btn-primary" value="accedi">
  
</form></center>
<?php
    if(isset($messaggio)){
        echo("<p class='errore'>". $messaggio . "</p>");
        unset($messaggio);
    }
?>   
</body>
<script type="text/javascript" src="controllaCampi.js"></script>
</html>