<?php
    include "../controller/utilisateurC.php";
    include_once '../model/utilisateur.php';

    $utilisateurC = new utilisateurC();
    $error = "";

    if (
       isset($_POST["nomutilisateur"]) && 
        isset($_POST["prenomutilisateur"]) &&
        isset($_POST["telephoneutilisateur"]) && 
        isset($_POST["dateutilisateur"]) && 
        isset($_POST["loginutilisateur"]) && 
        isset($_POST["mdputilisateur"])
    ){
        if (
             !empty($_POST["nomutilisateur"]) && 
            !empty($_POST["prenomutilisateur"]) &&
            !empty($_POST["telephoneutilisateur"]) &&  
            !empty($_POST["dateutilisateur"]) && 
            !empty($_POST["loginutilisateur"]) && 
            !empty($_POST["mdputilisateur"])
        ) {
            if( preg_match ( " /^[a-zA-Z]{2,}$/ " , $_POST['nomutilisateur'] )==1 && preg_match (" /^[a-zA-Z]{2,}$/ ", $_POST['prenomutilisateur'] )==1 && preg_match ( ' /^.+@.+\.[a-z]{2,}$/ ' , $_POST['loginutilisateur'] )==1 && preg_match ( ' #^[0-9]{8}+$# ', $_POST['telephoneutilisateur'])==1 ){
            $utilisateur = new utilisateur(
                $_POST['nomutilisateur'],
                $_POST['prenomutilisateur'], 
                
                $_POST['telephoneutilisateur'], 
                $_POST['dateutilisateur'],
                $_POST['loginutilisateur'],
                $_POST['mdputilisateur']
            );
            
            $utilisateurC->modifierutilisateur($utilisateur, $_GET['idutilisateur']);
           // header('Location:afficherPatient.php');
        }else {
            echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
            if($count!=0){echo 'L email existe deja '; echo "<br>";}
            if(preg_match ( " /^[a-zA-Z]{2,}$/ " , $_POST['nomutilisateur'] )==0){echo 'Le nom doit contenir que des lettres '; echo "<br>";}
            if(preg_match ( " /^[a-zA-Z]{2,}$/ " , $_POST['prenomutilisateur'] )==0){echo 'Le prenom doit contenir que des lettres '; echo "<br>";}
            if(preg_match ( ' /^.+@.+\.[a-zA-Z]{2,}$/ '  , $_POST['loginutilisateur'] )==0){echo 'L email est incorrect '; echo "<br>";} 
            if(preg_match ( " /^[0-9]{8}$/ " , $_POST['telephoneutilisateur'] )==0){echo 'Le numero de telephone doit contenir 8 chiffres '; echo "<br>";}
            
        }
    }
        else
            $error = "Missing information";
    }

?>

<?php
    session_start();
    if(!isset($_SESSION["idutilisateur"])){
   var_dump($_SESSION);
        exit(); 
    }
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Modifier mon profil </title>
        <meta content="" name="descriptison">
        <meta content="" name="keywords">
       
    </head>

    <body>
        
        
        <section></section>
        <?php
            if (isset($_GET['idutilisateur'])){
                $utilisateur = $utilisateurC->recupererutilisateur1($_GET['idutilisateur']);  
        ?>
            <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h1 class="text-center font-weight-light my-4">Modifier mon profil</h1>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                         <table  align="center">
                                            <tr>
                                                <td>
                                                    <label >Nom:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="nomutilisateur" id="nomutilisateur" maxlength="50" value = "<?php echo $utilisateur->nomutilisateur; ?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label >Prénom:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="prenomutilisateur" id="prenomutilisateur" maxlength="50" value = "<?php echo $utilisateur->prenomutilisateur; ?>">
                                                </td>
                                            </tr>

                                        

                                            <tr>
                                                <td>
                                                    <label >telephone:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="telephoneutilisateur" id="telephoneutilisateur" value = "<?php echo $utilisateur->telephoneutilisateur; ?>">
                                                </td>
                                            </tr>
                                                <tr>
                                                <td>
                                                    <label >date de naissance:</label>
                                                </td>
                                                <td>
                                                    <input  class="form-control" type="date" name="dateutilisateur" id="dateutilisateur"  value = "<?php echo $utilisateur->dateutilisateur; ?>">
                                                </td>
                                            </tr>
                                           

                                            <tr>
                                                <td>
                                                    <label >Login:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="loginutilisateur" id="loginutilisateur" value = "<?php echo $utilisateur->loginutilisateur; ?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label >Mot de passe:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="password" name="mdputilisateur" id="mdputilisateur" value = "<?php echo $utilisateur->mdputilisateur; ?>">
                                                </td>
                                            </tr>
                                </div>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input class="btn btn-primary btn-block" type="submit" value="Envoyer" onclick="verif();"> 
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input class="btn btn-primary btn-block" type="reset" value="Annuler" >
                                                </td>
                                            </tr>
                                        </table>
                                        </table>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>                         
            </div>
        </div>
        <?php
        }
        ?>
        



<!-- Template Main JS File -->
    </body>
</html>
