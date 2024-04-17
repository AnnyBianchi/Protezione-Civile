<?php
    session_start();
    unset($_SESSION["idOperatore"]);
    unset($_SESSION["tipoUtente"]);
    session_destroy();
    header("Location: login.php");
?>