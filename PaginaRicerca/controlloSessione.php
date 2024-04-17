<?php
    function controlloLogin()
    {
        if(isset($_SESSION["id"]) && isset($_SESSION["tipoUtente"])){
            return true;
        }
        else{
            return false;
        }
    }
?>