<?php
   include '../Controller/produitC.php';
    $produitC = new produitC();
       if (isset($_POST["id_produit"])){
       $produitC->supprimerproduit($_POST["id_produit"]);
       header('Location:CRUDproduit.php');
   }
?>