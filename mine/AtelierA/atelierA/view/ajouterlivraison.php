<?PHP

 include_once '../model/livraison.php';
 include_once '../controller/livraisonC.php';
                session_start();
if(!isset($_SESSION["idutilisateur"])){
    var_dump($_SESSION);
    header("Location: ../view/login.php");
;
    exit(); 
  }

    $error = "";
     $alert_region="La region doit contenir que des lettres";
     $alert_adresse="L'adresse doit contenir que des lettres ";
     $alert_codepostal="Le code postal  doit contenir 4 chiffres ";
     
    
    $livraison= null;

   

$livraisonC = new livraisonC();
    if (
        isset($_POST["regionlivraison"]) && 
        isset($_POST["adresselivraison"]) &&
        isset($_POST["codepostallivraison"]) 
	
    ) {
        if (
            !empty($_POST["regionlivraison"]) && 
            !empty($_POST["adresselivraison"]) && 
            !empty($_POST["codepostallivraison"]) 
			
        ) 
            {
			if( preg_match (" /^[a-zA-Z ]{2,}$/ ", $_POST['adresselivraison'] )==1 && preg_match ( ' #^[0-9]{4}+$# ', $_POST['codepostallivraison'])==1 ){
            $livraison = new livraison(
                $_POST['regionlivraison'],
                $_POST['adresselivraison'], 
                $_POST['codepostallivraison'],
				
              				
              
            );
            $livraisonC->ajouterlivraison($livraison);
            //header('Location:afficherlivreur.php');
			echo "<script>alert(\"Livraison notée\")</script>"; 
        
		}else {
            
           echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
           if(preg_match ( " /^[a-zA-Z ]{2,}$/ " , $_POST['adresselivraison'] )==0){echo 'l adresse contenir que des lettres';echo "<br>";}
           if(preg_match ( " /^[0-9]{4}$/ " , $_POST['codepostallivraison'] )==0){echo 'le code postal  doit contenir 4 chiffres';echo "<br>";}
         }
      }
		
        else
            $error = "informations manquantes";
    } 
 $listelivreur=$livraisonC->afficherzone(); 
?>
<!DOCTYPE html>
<html lang="en">
<!--<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ahla</title>
</head>-->
<head>
	<title>Livraison</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
<!--===============================================================================================-->
</head>
    <body><!-- Header -->
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
        
        
        <div id="error">
            <?php echo $error; ?>
        </div>
		<div class="card-body">
       
		<form class="bg0 p-t-75 p-b-85" action="" method="POST">
		<div class="container">
			<div class="row">

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 align="center" class="mtext-109 cl2 p-b-30">
							Livraison
						</h4>
                        
					    <hr>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Expedition:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
							
								<p class="stext-111 cl6 p-t-2">
									Entrez vos coordonnées.
								</p>
								
								<div class="p-t-15">
								

									<tr> 
									 <td> <label>Region:</label></td>
									 <select name="regionlivraison"  class="form-control" id="regionlivraison"  >
									 <option></option>
                      <?php 
                        foreach ($listelivreur as $livraison){
                      ?>
                            <option name="regionlivraison" class="form-control" id="regionlivraison"><?php echo $livraison['zonelivreur']; ?></option>
                            <?php
                                }
                            ?>
                    </select>
			
			</td></tr>

									<tr> <td> <label> Adresse: </label></td>
                 <td> <input class="form-control" type="text" name="adresselivraison" id="adresselivraison" maxlength="11"> <br> </td> </tr>
                 <tr><td> <label> Code Postal: </label></td>
                 <td> <input class="form-control" type="number" name="codepostallivraison" id="codepostallivraison" maxlength="11"> <br> </td> </tr>
                
								</div>
							</div>
						</div>
						<br>
                        <tr> <td> <input class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"  type="submit" name="Confirmer" value="Confirmer"></td></tr>
						
					</div>
				</div>
			</div>
		</div>
	</form>
		<!-- Footer -->
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
                
