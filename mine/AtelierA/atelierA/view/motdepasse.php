<?php

    include_once '../Model/utilisateur.php';
    require('../config.php');
    session_start();

        if (isset($_POST['loginutilisateur'])){
            $loginutilisateur=$_POST['loginutilisateur'];
            $sql="SELECT * FROM utilisateur WHERE loginutilisateur='" . $loginutilisateur . "'";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
                $count=$query->rowCount();
                if($count==1){
                    $utilisateur=$query->fetch();
                    $_SESSION['loginutilisateur'] = $loginutilisateur;
                    $_SESSION['idutilisateur'] = $utilisateur['idutilisateur'];
                    $idutilisateur=$utilisateur['idutilisateur'];
                    $code=mt_rand(1000,9999);
                    $sql="UPDATE utilisateur SET code= '" . $code . "' WHERE loginutilisateur='" . $loginutilisateur . "'";
                    $db = config::getConnexion();
                    $query1=$db->prepare($sql);
                    $query1->execute();

                    $loginutilisateur1="behijabenghorbel@gmail.com";    
                    $dest = $loginutilisateur;
                    $sujet = "Réinitialisation du mot de passe";
                    $corp =" Bonjour $idutilisateur voici votre code de verification $code " ;
                    $headers = 'From: ' .$loginutilisateur1 . "\r\n".'Reply-To: ' . $loginutilisateur1. "\r\n".'X-Mailer: PHP/' . phpversion();
                    if (mail($dest, $sujet, $corp, $headers)) {
                        echo "loginutilisateur envoyé avec succès à $dest ...";
                    } 
                    else {
                         echo "Échec de l'envoi de l'loginutilisateur...";
                    }
                    header("Location: verifpassword.php");
                }
		    }
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
            }
        } 



?>

<!DOCTYPE html>
<html >
    <head>
        
    </head>

    <body>
        
        <section></section>

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h1 style=" text-align: center; color: #da1c5c;">Mot de passe oublié</h1>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <table  align="center">
                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="loginutilisateur">Adresse mail:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="loginutilisateur" name="loginutilisateur" id="loginutilisateur" pattern=".+@gmail.com|.+@esprit.tn|.+@yahoo.com|.+@yahoo.fr" placeholder="Entrer l'adresse mail">
                                                </td>
                                            </tr>
                                </div>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input class="btn btn-primary btn-block" type="submit" value="Envoyer" > 
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input class="btn btn-primary btn-block" type="reset" value="Annuler" >
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>                         
            </div>
        </div>
    </body>
</html>
