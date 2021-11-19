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
            if( preg_match ( " /^[a-zA-Z ]{2,}$/ " , $_POST['nomutilisateur'] )==1 && preg_match (" /^[a-zA-Z ]{2,}$/ ", $_POST['prenomutilisateur'] )==1 && preg_match ( ' /^.+@.+\.[a-z]{2,}$/ ' , $_POST['loginutilisateur'] )==1 && preg_match ( ' #^[0-9]{8}+$# ', $_POST['telephoneutilisateur'])==1 ){
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
            if(preg_match ( " /^[a-zA-Z ]{2,}$/ " , $_POST['nomutilisateur'] )==0){echo 'Le nom doit contenir que des lettres '; echo "<br>";}
            if(preg_match ( " /^[a-zA-Z ]{2,}$/ " , $_POST['prenomutilisateur'] )==0){echo 'Le prenom doit contenir que des lettres '; echo "<br>";}
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
         <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Compte</title>
    <!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="../images/icons/favicon.png"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

    </head>
    <body>
          <header class="header-v4">
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <!-- Topbar -->
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                    
                    </div>

                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            Aide & FAQs
                        </a>

                        <a href="../index.php" class="flex-c-m trans-04 p-lr-25">
Compte
                        </a>

                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            EN
                        </a>

                        <!--<a href="#" class="flex-c-m trans-04 p-lr-25">
                            USD
                        </a>-->
                    </div>
                </div>
            </div>

            <div class="wrap-menu-desktop how-shadow1">
                <nav class="limiter-menu-desktop container">
                    
                    <!-- Logo desktop -->       
                    <a href="#" class="logo">
                        <img src="../images/icons/logo-01.png" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                       <div class="menu-desktop">
                        <ul class="main-menu">
                            <li>
                                <a href="showpromotion.php">Accueil</a>
                                <ul class="sub-menu">
                                    <li><a href="index.php">Pro 1</a></li>
                                    <li><a href="home-02.html">Homepage 2</a></li>
                                    <li><a href="home-03.html">Homepage 3</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="product.php">Produits</a>
                            </li>

                            <li >
                                <a href="shoping-cart.html">Livraison</a>
                            </li>

                            <li>
                                <a href="../view/showarticle.php">blog</a>
                            </li>

                            <li>
                                <a href="modifyutilisateur.php">A propos</a>
                            </li>

                            <li>
                                <a href="#">S.A.V</a>
                                <ul class="sub-menu">
                                    <li><a href="../view/ajouterreclamation.php"> Reclamation</a></li>
                                    <li><a href="../view/ajoutercartefidalite"> carte-fidelité</a></li>
                                </ul>
                            </li>
                       
                        </ul>
                    </div>  


                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>

                    </div>
                </nav>
            </div>  
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->        
            <div class="logo-mobile">
                <a href="index.php"><img src="../images/icons/logo-01.png" alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>

                <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
                    <i class="zmdi zmdi-favorite-outline"></i>
                </a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                

                <li>
                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m p-lr-10 trans-04">
                            Help & FAQs
                        </a>

                        <a href="connexion.php" class="flex-c-m p-lr-10 trans-04">
                            Connexion
                        </a>

                        <a href="#" class="flex-c-m p-lr-10 trans-04">
                            EN
                        </a>

                        <!--<a href="#" class="flex-c-m p-lr-10 trans-04">
                            USD
                        </a> -->
                    </div>
                </li>
            </ul>

            <ul class="main-menu-m">
                <li>
                    <a href="index.php">Accueil</a>
                    <ul class="sub-menu-m">
                        <li><a href="index.html">Homepage 1</a></li>
                        <li><a href="home-02.html">Homepage 2</a></li>
                        <li><a href="home-03.html">Homepage 3</a></li>
                    </ul>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <li>
                    <a href="product.php">Produits</a>
                </li>

                <li>
                    <a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Livraison</a>
                </li>

                <li>
                    <a href="showarticle.php">blog</a>
                </li>

                <li>
                    <a href="about.html">About</a>
                </li>

                <li>
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="images/icons/icon-close2.png" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Search...">
                </form>
            </div>
        </div>
    </header>
    <!-- fin header********************************************************************************* -->

  


  <!-- breadcrumb -->
  <div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
      <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
        Accueil
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
      </a>

      <span class="stext-109 cl4">
        Connexion
      </span>
    </div>
  </div>
    

  

    



  </header><!-- End Header -->
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
                                                    <input class="form-control" type="password" name="mdputilisateur" id="mdputilisateur" value = "<?php echo $utilisateur->mdputilisateur; ?>"><br>
                                                </td>
                                                
                                            </tr>
                                </div>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit" value="Envoyer" onclick="verif();"> <br>
                                                </td>

                                            
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="reset" value="Annuler" >
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
        <?php
        }
        ?>
                <!-- Footer *********************************************************************-->
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Categories
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Peinture à l'huile
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Peinture acrylique
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Peinture sur verre
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Aide
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Contact
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Connexion
                            </a>
                        </li>


                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                FAQs
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Pour plus d'infos
                    </h4>

                    <p class="stext-107 cl7 size-201">
                     Visitez nos locaux à Ariana Soghra , Esprit , Technopol 
                    </p>

                    <div class="p-t-27">
                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-instagram"></i>
                        </a>

                        
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Journal
                    </h4>

                    <form>
                        <div class="wrap-input1 w-full p-b-4">
                            <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
                            <div class="focus-input1 trans-04"></div>
                        </div>

                        <div class="p-t-18">
                            <button class="flex-c-m stext-101 cl2 size-103 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                Suivre
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            
        </div>
    </footer>

    </body>
</html>
