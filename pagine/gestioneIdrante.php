<?php

if(($_POST)){
  
  //inserimento
      if(isset($_POST['ID']))
      {
        include('riempimento.php');
      }
      else{
        if(isset($_POST['ID_Mod']))
        {
          include('modificaIdranti.php');
          
        }
        else{
          include('controllo.php');
        }
      }

  
}

?>
