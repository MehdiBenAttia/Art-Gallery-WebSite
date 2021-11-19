<?php
	include "../controller/livreurC.php";

	$livreurC=new livreurC();
	
	if (isset($_POST["idlivreur"])){
		$livreurC->supprimerlivreur($_POST["idlivreur"]);
		header('Location:afficherlivreur.php');
	}

?>
