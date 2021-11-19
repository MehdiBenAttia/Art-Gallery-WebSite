<?php

    require('../config.php');
    session_start();

    if (isset($_POST['code'])){

        $loginutilisateur=$_SESSION['loginutilisateur'] ;
        $code=$_POST['code'];
        $sql="SELECT * FROM utilisateur WHERE loginutilisateur='" . $loginutilisateur . "' && code = '". $code."'";
                $db = config::getConnexion();
                try{
                    $query=$db->prepare($sql);
                    $query->execute();
                    $count=$query->rowCount();
                    if($count==1){
                        $utilisateur=$query->fetch(); 
                        header("Location: nouveaupassword.php");
                    }  
                }
                catch (Exception $e){
                    die('Erreur: '.$e->getMessage());
                }
    } 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>vérification du code</title>
        <meta content="" name="descriptison">
        <meta content="" name="keywords">
        
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
                                    <h1 style=" text-align: center; color: #da1c5c;">Code de vérification</h1>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <table  align="center">
                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="code">code de verification:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="int" name="code" id="code"  placeholder="Entrer le code">
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
