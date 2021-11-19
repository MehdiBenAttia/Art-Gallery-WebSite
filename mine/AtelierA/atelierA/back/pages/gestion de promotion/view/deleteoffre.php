<?php
   
   include '../controller/offreC.php';
   $offreC = new offreC() ;
       if (isset($_POST["id"])){
       $offreC->supprimeroffre($_POST["id"]);
       header('Location:addoffre.php');
   }
?>