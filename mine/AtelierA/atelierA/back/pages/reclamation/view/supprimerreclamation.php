<?php
	include "../controller/reclamationC.php";

	$reclamationC=new reclamationC();
	
	if (isset($_POST["numreclamation"])){
		$reclamationC->supprimerreclamation($_POST["numreclamation"]);
		header('Location:afficherreclamation.php');
	}

?>