<?PHP

 include_once '../model/cartefidalite.php';
 include_once '../controller/cartefidaliteC.php';


  session_start();
if(!isset($_SESSION["idutilisateur"])){
    var_dump($_SESSION);
    header("Location: ../view/login.php");
    exit(); 
  }
    $error = "";
	
	$cartefidalite= null;
	
    $cartefidaliteC = new cartefidaliteC();
    if (
        isset($_POST["num_cartefidalite"]) && 
		isset($_POST["nom_cartefidalite"]) && 
		isset($_POST["prenom_cartefidalite"]) && 
        isset($_POST["date_cartefidalite"]) 
         ) {
        if (
            !empty($_POST["num_cartefidalite"])&& 
			!empty($_POST["nom_cartefidalite"]) && 
			!empty($_POST["prenom_cartefidalite"]) && 
            !empty($_POST["date_cartefidalite"]) 
        ) {
			if( preg_match ( " /^[a-zA-Z]{2,}$/ " , $_POST['nom_cartefidalite'] )==1 && preg_match (" /^[a-zA-Z]{2,}$/ ", $_POST['prenom_cartefidalite'] )==1  && preg_match ( ' #^[0-9]{8}+$# ', $_POST['num_cartefidalite'])==1 ){
            $cartefidalite = new cartefidalite(
			    $_POST['num_cartefidalite'],
			    $_POST['nom_cartefidalite'],
                $_POST['prenom_cartefidalite'],
                $_POST['date_cartefidalite'],  
              
            );
            $cartefidaliteC->ajoutercartefidalite($cartefidalite);
        }
        else
		 {
            echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
           /* if($count!=0){echo 'Le nom existe deja'; echo "<br>";}*/
            if(preg_match ( " /^[a-zA-Z]{2,}$/ " , $_POST['nom_cartefidalite'] )==0){echo 'Le nom doit contenir que des lettres '; echo "<br>";}
            if(preg_match ( " /^[a-zA-Z]{2,}$/ " , $_POST['prenom_cartefidalite'] )==0){echo 'Le prenom doit contenir que des lettres '; echo "<br>";}
            if(preg_match ( " /^[0-9]{8}$/ " , $_POST['num_cartefidalite'] )==0){echo 'Le numero de telephone doit contenir 8 chiffres '; echo "<br>";}
           
        }
    }else
	
            $error = "informations manquantes";
    } 
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>cartefidalite</title>
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
		
		<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../images/im.jpg');">
		<h2 class="ltext-103 cl0 txt-center">
			Carte fidelité
		</h2>
	</section>	
	
	
	
	
<!-- formulaire principale -->		
		
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
       <div id="error">
            <?php echo $error; ?>
        </div>
		

         <form action="" method="POST">
            <section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form>
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Remplir Ce Formulaire
						</h4>

                        <tr > <td> <label> <b>Date de naissance:</b> </label></td> 
                  <td> <input class="form-control" type="date" name="date_cartefidalite" id="date_cartefidalite" > </td> </tr>

 <tr > <td> <label> <b>votre nom</b> </label></td> 
                 <td> <input class="form-control" type="text" name="nom_cartefidalite" id="nom_cartefidalite" maxlength="50"  > </td> </tr>

 <tr > <td> <label><b> votre prenom :</b> </label></td> 
                  <td> <input class="form-control" type="text" name="prenom_cartefidalite" id="prenom_cartefidalite" maxlength="50"  > </td> </tr>
 <tr > <td> <label><b> votre numero :</b> </label></td> 
                  <td> <input class="form-control" type="number" name="num_cartefidalite" id="num_cartefidalite" maxlength="50"  > </td> </tr>


				 <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Submit
						</button>
					</form>
				</div>
                
              
			
			<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								Ariana Soghra , Esprit , Technopol
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Lets Talk
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								+1 800 1236879
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Sale Support
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								mootez.gam@esprit.tn
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		</section>
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
      


	
	
	
	
	<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="C:/wamp64/www/artico/front/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="C:/wamp64/www/artico/front/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="C:/wamp64/www/artico/front/vendor/bootstrap/js/popper.js"></script>
	<script src="C:/wamp64/www/artico/front/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="C:/wamp64/www/artico/front/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	
</body>
    </html>
