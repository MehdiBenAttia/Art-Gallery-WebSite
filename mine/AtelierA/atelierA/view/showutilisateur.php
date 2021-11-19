<?PHP
include "../Controller/utilisateurC.php";

	$utilisateurC=new utilisateurC();
	$listeutilisateur=$utilisateurC->afficherutilisateur(); 

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher utilisateurs </title>
    </head>
    <body>
		<div><a href="addutilisateur.php">Ajouter un utilisateur</a></div>
		 <table border=1 align = 'center'>
			<th>Id</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>telephone</th>
				<th>Date de naissance</th>
				<th>Login</th>
								<th>Mdp</th>

			</tr>
			<?PHP
				foreach($listeutilisateur as $utilisateur){
			?>
				<tr>
					 <td><?PHP echo $utilisateur['idutilisateur']; ?></td>
					<td><?PHP echo $utilisateur['nomutilisateur']; ?></td>
				
					<td><?PHP echo $utilisateur['prenomutilisateur']; ?></td>
										<td><?PHP echo $utilisateur['telephoneutilisateur']; ?></td>
										<td><?PHP echo $utilisateur['dateutilisateur']; ?></td>
										<td><?PHP echo $utilisateur['loginutilisateur']; ?></td>
										<td><?PHP echo $utilisateur['mdputilisateur']; ?></td>


					 
					<td>
						<form method="POST" action="deleteutilisateur.php">
						<input type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $utilisateur['idutilisateur']; ?> name="idutilisateur">
						</form>
					</td>
					<td>
		<a href="modifyutilisateurs.php?idutilisateur=<?PHP echo $utilisateur['idutilisateur']; ?>"> Modifier </a>
				

					</td>
				</tr>
			<?PHP
				}
			?>
		</table>


	</body>
	</html> 