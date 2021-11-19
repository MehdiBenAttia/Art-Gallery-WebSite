<?php

    require('../config.php');
    session_start();

    if (isset($_POST['mdputilisateur'])){
        $loginutilisateur=$_SESSION['loginutilisateur'] ;
        $mdputilisateur=$_POST['mdputilisateur'];
        if($_POST['mdputilisateur']==$mdputilisateur){
            $sql="UPDATE utilisateur SET mdputilisateur= '" . $mdputilisateur . "'' WHERE loginutilisateur='" . $loginutilisateur . "'";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                header("Location: login.php");
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        else {
                echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
                echo 'Verifier votre mot de passe ';}
    } 
?>





<!DOCTYPE html>
<html lang="en">
  

    <body>
      
        <
        <section></section>
     
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h1 style=" text-align: center; color: #da1c5c;">Nouveau mot de passe</h1>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <table  align="center">
                                        
                                                <td>
                                                    <label class="small mb-1" for="password">Mot de passe:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="password" name="mdputilisateur" id="password" placeholder="Entrer le mot de passe">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="confpassword">Verifier Mot de passe:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="password" name="confpassword" id="confpassword" placeholder="Confirmer le mot de passe">
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



















