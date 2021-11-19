<?php
   
   include '../controller/promotionC.php';
   $promotionC = new promotionC() ;
       if (isset($_POST["id"])){
       $promotionC->supprimerpromotion($_POST["id"]);
       header('Location:addpromotion.php');
   }
?>