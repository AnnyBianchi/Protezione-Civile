<?php
    include("controlloSession.php");
    session_start();
    if(controlloSessione()==false){
        header("Location: login.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styleLogin.css" type="text/css">
</head>
<body>
    <h1 style="font-size:275%;">SEI AUTENTICATOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOA</h1><br>
    <a href="logout.php">
        <button style="font-size: 300%; font-family: 'goldplayBold';">Fai il logout</button>
    </a>
</body>
</html>