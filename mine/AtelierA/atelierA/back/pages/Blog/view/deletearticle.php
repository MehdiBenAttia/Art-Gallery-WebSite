 <?php
   
    include '../Controller/articleC.php';
    $articleC = new articleC() ;
    	if (isset($_POST["idarticle"])){
		$articleC->supprimerarticle($_POST["idarticle"]);
		header('Location:showarticle.php');
	}
?>