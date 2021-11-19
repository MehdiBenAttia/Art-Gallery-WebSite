<?php
    include "../controller/cartefidaliteC.php";
    include_once '../model/cartefidalite.php';

	$cartefidaliteC = new cartefidaliteC();
	$error = "";

	if (
       isset($_POST["num_cartefidalite"]) && 
		isset($_POST["nom_cartefidalite"]) && 
		isset($_POST["prenom_cartefidalite"]) && 
        isset($_POST["date_cartefidalite"]) 
       
    ){
		if (
           !empty($_POST["num_cartefidalite"]) && 
			!empty($_POST["nom_cartefidalite"]) && 
			!empty($_POST["prenom_cartefidalite"]) && 
            !empty($_POST["date_cartefidalite"]) 
             

        ) {
            $cartefidalite = new cartefidalite(
                $_POST['num_cartefidalite'],
			    $_POST['nom_cartefidalite'],
                $_POST['prenom_cartefidalite'],
                $_POST['date_cartefidalite'] ,  
                
            );
            
            $cartefidaliteC->modifiecartefidalite($cartefidalite, $_GET['id_cartefidalite']);
           // header('Location:afficherUtilisateurs.php');
        }
        else
            $error = "Missing information";
	}

?>
<html>
	<head>
		<title>Modifier cartefidalite</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<button><a href="affichercartefidalite.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
		
		<?php
		echo "message";
			if (isset($_GET['id_cartefidalite'])){
				
				$cartefidalite = $cartefidaliteC->recuperercartefidalite($_GET['id_cartefidalite']);
				
		?>
		<form action="" method="POST">
            <table align="center">
                <tr>
                    <td rowspan='4' colspan='1'></td>
                    <td>
                        <label for="num_cartefidalite">num_cartefidalite:
                        </label>
                    </td>
                    <td><input type="int" name="num_cartefidalite" id="num_cartefidalite" maxlength="20" value = "<?php echo $cartefidalite['num_cartefidalite']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nom_cartefidalite">nom_cartefidalite:
                        </label>
                    </td>
                    <td><input type="text" name="nom_cartefidalite" id="nom_cartefidalite" maxlength="20" value = "<?php echo $cartefidalite['nom_cartefidalite']; ?>"></td>
                </tr>
                
				<td>
                        <label for="prenom_cartefidalite">prenom_cartefidalite:
                        </label>
                    </td>
                    <td><input type="text" name="prenom_cartefidalite" id="prenom_cartefidalite" maxlength="20" value = "<?php echo $cartefidalite['prenom_cartefidalite']; ?>"></td>
                </tr><td>
                        <label for="prenom_cartefidalite">prenom_cartefidalite:
                        </label>
                    </td>
                    <td><input type="date" name="date_cartefidalite" id="date_cartefidalite" maxlength="20" value = "<?php echo $cartefidalite['date_cartefidalite']; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier" name = "modifer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
	</body>
</html>