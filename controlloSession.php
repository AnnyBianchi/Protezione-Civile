<?php
    function controlloSessione(){
        if(isset($_SESSION["idOperatore"]) && isset($_SESSION["tipoUtente"])){
            return true;
        }
        else{
            return false;
        }
    }
?>