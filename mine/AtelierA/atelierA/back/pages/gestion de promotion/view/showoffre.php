<?PHP
include "../controller/offreC.php";

	$offreC=new offreC();
	$listeoffre=$offreC->afficheroffre(); 

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher offre </title>
    </head>
    <body>
		<button><a href="addoffre.php">Ajouter offre</a></button>
		<hr> <table>
			
			<?PHP
				foreach($listeoffre as $offre){
			?>
				<tr>
					
					 <p>la duree est:</p> <?PHP echo $offre['duree']; ?>
				
                    </tr>
                    <tr>
					 <p>la remise est:</p> <?PHP echo $offre['remise']; ?>
			
			      </tr>
					<td>
						<form method="POST" action="deleteoffre.php">
						<input type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $offre['id']; ?> name="id">
						</form>
					</td>
					<td>
						<a href="modifyoffre.php?id=<?PHP echo $offre['id']; ?>"> Modifier </a>
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>


	</body>
	</html> 