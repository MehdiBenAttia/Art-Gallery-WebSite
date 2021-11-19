<?php
	include "../controller/cartefidaliteC.php";

	$cartefidaliteC=new cartefidaliteC();
	
	if (isset($_POST["id_cartefidalite"])){
		$cartefidaliteC->supprimercartefidalite($_POST["id_cartefidalite"]);
		header('Location:affichercartefidalite.php');
	}

?>