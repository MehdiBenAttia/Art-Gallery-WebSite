<?php
    include_once '../controller/produitC.php';
    require_once '../Model/produit.php';

    

    $error = "";
    $verif_descr=0;
    $verif_nom=0;
    $verif_prix=0;
    $alert_nom="Le nom doit contenir que des lettres";
    $alert_desc="La description doit contenir que des lettres ";
    $alert_prix="Le prix doit contenir exactement 4 chiffres ";

    // create user
    $produit = null;

    // create an instance of the controller
    $produitC = new produitC();
    if (
        isset($_POST["nom_produit"]) && 
        isset($_POST["image_produit"]) &&
        isset($_POST["description_produit"])&&
        isset($_POST["prix_produit"]) &&
        isset($_POST["categorie_produit"]) 
        
    ) {
        if (
            !empty($_POST["nom_produit"]) && 
            !empty($_POST["image_produit"]) && 
            !empty($_POST["description_produit"]) && 
            !empty($_POST["prix_produit"]) && 
            !empty($_POST["categorie_produit"])
         ){
        if( preg_match ( " /^[a-zA-Z ]{2,}$/ " , $_POST['nom_produit'] )==1 && preg_match (" /^[a-zA-Z ]{2,}$/ ", $_POST['description_produit'] )==1 && preg_match ( ' #^[0-9]{4}+$# ', $_POST['prix_produit'])==1 ){ 
            
            $produit = new produit(
                $_POST['nom_produit'],
                $_POST['image_produit'], 
                $_POST['description_produit'],
                $_POST['prix_produit'],
                $_POST['categorie_produit']
              
            );
            $produitC->ajouterProduit($produit);
            header('Location:CRUDproduit.php');

          }else {
            
            if(preg_match ( " /^[a-zA-Z]{2,}$/ " , $_POST['nom_produit'] )==0){$verif_nom=1;}
            if(preg_match ( " /^[a-zA-Z ]{2,}$/ " , $_POST['description_produit'] )==0){$verif_descr=1;}
            if(preg_match ( " /^[0-9]{4}$/ " , $_POST['prix_produit'] )==0){$verif_prix=1;}
        }
      }
        else
            $error = "Missing information";
    } 

    if ((isset($_POST["recherche"]))&& (isset($_POST["colonne"]))){
      if (!empty(isset($_POST["recherche"]))){
       $n=$_POST["colonne"];
       echo ("colonne = $n " );
        $listeproduit=$produitC->rechercher($_POST["recherche"],$n);
      } 
       }
       else{
        $listeproduit=$produitC->afficherProduit();
       }


       $listecategorie=$produitC->afficherCategorie(); 
    
    ?>















<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
    <!-- partial:../../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="../../../index.html"><img src="../../../images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../../index.html"><img src="../../../images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../../images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../../partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="../../../images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../../images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../../images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../../images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../../images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../../images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:../../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Gestion d'achats</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/commande.html">commande</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/panier.html">panier</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Gestion de livraisons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">livraison</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">livreur</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Gestion de produits</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="CRUDproduit.php">produits</a></li>
                <li class="nav-item"> <a class="nav-link" href="CRUDcatégorie.php">catégorie</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Gestion de reclamation</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Reclamation</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">carte fidelité</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Gestion de promotions</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Promotions</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Offres</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Gestion d'utilisateur</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html">Se connecter</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html">S'inscrire </a></li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter un produit</h4>
                  
                  <div id="error">
            <?php echo $error; ?>
        </div>

                  <form class="forms-sample" method="POST" action="">
                    <div class="form-group">
                      <label for="nom_produit">Nom du produit</label>
                      <input type="text" name="nom_produit" class="form-control" id="nom_produit" placeholder="Nom du Produit" > 
                      <?php
                      if($verif_nom==1){
                      echo $alert_nom;
                      $verif_nom=0;
                      }

                      ?>
                      
                      
                    </div>
                    <div class="form-group">
                      <label class="btn btn-primary mr-2" for="image_produit" style="display:block;">Choisir une image </label>
                      <input type="file" name="image_produit" style="display:none;"class="form-control" id="image_produit" accept=".jpg,.jpeg,.png" >
               
                    </div>
                    <div class="form-group">
                      <label for="description_produit">Description du produit</label>
                      <input type="texte"  name="description_produit" class="form-control" id="description_produit" placeholder="Description du produit"  >
                      <?php
                      if($verif_descr==1){
                      echo $alert_desc;
                      $verif_descr=0;
                      }

                      ?>
                    </div>
                    <div class="form-group">
                      <label for="prix_produit">Prix du produit</label>
                      <input type="number"  name="prix_produit" class="form-control" id="prix_produit" placeholder="Prix du produit" >
                      <?php
                      if($verif_prix==1){
                      echo $alert_prix;
                      $verif_prix=0;
                      }

                      ?>
                    </div>

                    <!-- <div class="form-group">
                      <label for="categorie_produit">Catégorie du produit</label>
                      <input type="Texte" name="categorie_produit" class="form-control" id="categorie_produit" placeholder="Categorie">
                    </div> -->
                    <div class="form-group">
                      <label for="categorie_produit">Catégorie du produit</label>
                      <select name="categorie_produit" id="categorie_produit">
                      <?php 
                        foreach ($listecategorie as $produit){
                      ?>
                            <option name="categorie_produit" class="form-control" id="categorie_produit"><?php echo $produit['nom_categorie']; ?></option>
                            <?php
                                }
                            ?>
                    </select>
                    </div>


                    <!-- <div class="form-group">
                    <select name="categorie_produit" class="form-control" id="categorie_produit">
                    <?php

                    // $link = mysqli_connect("localhost","web","root","");

                    // $sql = "SELECT * FROM categorie ;";

                    // $result = mysqli_query($link,$sql);
                    // if ($result != 0) {
                    // echo '<label>categorie:';
                    // echo '<select name="categorie">';
                    // echo '<option value="">all</option>';

                    // $num_results = mysqli_num_rows($result);
                    // for ($i=0;$i<$num_results;$i++) {
                    // $row = mysqli_fetch_array($result);
                    // $name = $row['nom_categorie'];
                    // echo '<option value="' .$name. '">' .$name. '</option>';
                    // }

                    // echo '</select>';
                    // echo '</label>';
                    //   }

                    // mysqli_close($link);

                    ?>
                    </select>
                      
                    </div>                      -->
                                        

                    <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Remember me
                      <i class="input-helper"></i></label>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light" type="reset">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            
            <div class="col-lg-9 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Les produits</h4>

                  <form method="POST" action="">
        <select name="colonne" class=" flex-c-m text-center size-905 bor4 pointer hov-btn3"  style="width: 180px;">
        <option value="all" >Tous</option>
          <option value="nom_produit">Nom de produit</option>
          <option value="categorie_produit">Categorie de produit</option>
          <option value="prix_produit">Prix de produit</option>
        </select>
          <input type="text" name="recherche" placeholder="Rechercher" class=" m-b-10 flex-c-m text-center size-105 bor4 pointer hov-btn3  m-tb-4 "> 
          <input type="submit" name="chercher" value="Valider" class="m-t-0 flex-c-m text-center size-105 bor4 pointer hov-btn3  m-tb-4" style="width: 180px;">

       </form>
                  
                  <div class="table-responsive pt-3">
                  
                  
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            Id
                          </th>
                          <th>
                            Nom
                          </th>
                          <th>
                            Image
                          </th>
                          <th>
                            Description
                          </th>
                          <th>
                            Prix
                          </th>
                          <th>
                            Catégorie
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          foreach($listeproduit as $produit){
                            ?>

                          
              
                        <tr>
                            <td><?PHP echo $produit['id_produit']; ?></td>
                            <td><?PHP echo $produit['nom_produit']; ?></td>
                            <td><img src="../../../../images/peinture/<?PHP echo $produit['image_produit']; ?>"></td>
                            <td><?PHP echo $produit['description_produit']; ?></td>
                            <td><?PHP echo $produit['prix_produit']; ?></td>
                            <td><?PHP echo $produit['categorie_produit']; ?></td>
                            <td>
						                          <form method="POST" action="deleteproduit.php">
						                          <input class="btn btn-outline-danger btn-sm" type="submit" name="supprimer" value="supprimer">
						                          <input type="hidden" value=<?PHP echo $produit['id_produit']; ?> name="id_produit">
                                      <a class="btn btn-outline-success btn-sm" href="modifierproduct.php?id_produit=<?PHP echo $produit['id_produit']; ?>" name="Modifier" > Modifier </a>
                                <a class="btn btn-outline-info" href="../../../fpdf/pdf.php?id_produit=<?PHP echo $produit['id_produit']; ?>" name="imprimer" > pdf </a>
						                          </form>
					                  </td>
				                  	
                          
                        </tr>
                        <?PHP
				                  }
			                  ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
        <!-- content-wrapper ends -->
        <!-- partial:../../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../../js/off-canvas.js"></script>
  <script src="../../../js/hoverable-collapse.js"></script>
  <script src="../../../js/template.js"></script>
  <script src="../../../js/settings.js"></script>
  <script src="../../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
