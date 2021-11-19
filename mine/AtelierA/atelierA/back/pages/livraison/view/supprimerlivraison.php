<?php
	include "../controller/livraisonC.php";

	$livraisonC=new livraisonC();
	
	if (isset($_POST["codelivraison"])){
		$livraisonC->supprimerlivraison($_POST["codelivraison"]);
		header('Location:afficherlivraison.php');
	}

?>
