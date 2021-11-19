 <?php
   
    include '../Controller/utilisateurC.php';
    $utilisateurC = new utilisateurC() ;
    	if (isset($_POST["idutilisateur"])){
		$utilisateurC->supprimerutilisateur($_POST["idutilisateur"]);
		header('Location:showutilisateur.php');
	}
?>