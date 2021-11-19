<?php
    include "../controller/reclamationC.php";
    include_once '../model/reclamation.php';

	$reclamationC = new reclamationC();
	$error = "";

	if (
        isset($_POST["emailreclamation"]) && 
        isset($_POST["messagereclamation"]) 
       
    ){
		if (
            !empty($_POST["emailreclamation"]) && 
            !empty($_POST["messagereclamation"]) 
             

        ) {
            $reclamation = new reclamation(
                $_POST['emailreclamation'],
                $_POST['messagereclamation']
                
            );
            
            $reclamationC->modifiereclamation($reclamation, $_GET['numreclamation']);
           // header('Location:afficherUtilisateurs.php');
        }
        else
            $error = "Missing information";
	}

?>
<html>
	<head>
		<title>Modifier reclamation</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<button><a href="afficherreclamation.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
		
		<?php
		echo "message";
			if (isset($_GET['numreclamation'])){
				
				$reclamation = $reclamationC->recupererreclamation($_GET['numreclamation']);
				
		?>
		<form action="" method="POST">
            <table align="center">
                <tr>
                    <td rowspan='2' colspan='1'></td>
                    <td>
                        <label for="emailreclamation">emailreclamation:
                        </label>
                    </td>
                    <td><input type="text" name="emailreclamation" id="emailreclamation" maxlength="20" value = "<?php echo $reclamation['emailreclamation']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="messagereclamation">messagereclamation:
                        </label>
                    </td>
                    <td><input type="text" name="messagereclamation" id="messagereclamation" maxlength="20" value = "<?php echo $reclamation['messagereclamation']; ?>"></td>
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