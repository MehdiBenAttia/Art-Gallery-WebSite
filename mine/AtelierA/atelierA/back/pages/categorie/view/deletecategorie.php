<?php
   include '../Controller/categorieC.php';
    $categorieC = new categorieC();
       if (isset($_POST["id_categorie"])){
       $categorieC->supprimercategorie($_POST["id_categorie"]);
       header('Location:CRUDcategorie.php');
   }
?>