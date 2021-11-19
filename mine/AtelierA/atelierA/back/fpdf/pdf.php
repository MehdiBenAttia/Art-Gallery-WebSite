<?php
// require('../utilisateurs/ma_session.php');
// require('../connexion.php');
// require("../fonctions.php");

include_once '../Pages/Produit/config.php';
include_once '../Pages/Produit/model/produit.php';




if (isset($_GET['id_produit']))
    $ids = $_GET['id_produit'];
else
    $ids = 0;

$db = config ::getConnexion();
$sql="SELECT * FROM produit WHERE id_produit=$ids";

$listeproduit = $db->query ($sql);
$produit = $listeproduit->fetch();

require('fpdf.php');

//Création d'un nouveau doc pdf (Portrait, en mm , taille A5)
$pdf = new FPDF('P', 'mm', 'A5');

//Ajouter une nouvelle page
$pdf->AddPage();

// entete
$pdf->Image('en-tete.png', 10, 5, 130, 30);

// Saut de ligne
$pdf->Ln(12);


// Police Arial gras 16
$pdf->SetFont('Arial', 'B', 16);

// Titre
$nom_produit=$produit['nom_produit'];
$id_produit=$produit['id_produit'];
$image_produit=$produit['image_produit'];
$description_produit=$produit['description_produit'];
$prix_produit=$produit['prix_produit'];
$categorie_produit=$produit['categorie_produit'];


$pdf->Ln(20);
$pdf->Cell(0, 10, "Produit $nom_produit", 'TB', 1, 'C');
$pdf->Cell(0, 10, 'N°:'.$id_produit, 0, 1, 'C');

// Saut de ligne
$pdf->Ln(5);

// Début en police Arial normale taille 10

$pdf->SetFont('Arial', '', 10);
$h = 7;
$retrait = "      ";

$pdf->Write($h, "Je soussigné, Mehdi Ben Attia Président Directeur Générale: \n ");

$pdf->Write($h, $retrait . "Voici notre produit: ");

//Ecriture en Gras-Italique-Souligné(U)
$pdf->SetFont('', 'BIU');
$pdf->Text(70, 90 ,"Le nom:$nom_produit");
$pdf->Image("../../images/peinture/$image_produit", 18, 85, 45, 45);

$pdf->Text(70, 100 ,"Le prix :$prix_produit TND");
$pdf->Text(70, 110 ,"La description :$description_produit");
$pdf->Text(70, 120 ,"La catégorie :$categorie_produit");



//Ecriture normal
$pdf->SetFont('', '');

// $pdf->Write($h, $retrait . "Né (e) Le : " . $date_naiss . " À : " . $lieu_naiss . "\n");

// $pdf->Write($h, $retrait . "CIN N° : " . $cin . " \n");

// $pdf->Write($h, $retrait . "Inscrit (e) le : " . $date_insc . " Sous le N° : " . $num_insc . " \n");

// $pdf->Write($h, $retrait . "Filière :  " . $filiere . " \n");

// $pdf->Write($h, $retrait . "Niveau de formation :  " . $niveau . "  \n");

// $pdf->Write($h, $retrait . "Classe :  " . $classe . " \n");

// $pdf->Write($h, $retrait . "Année de formation :  " . $as . "  \n");

// $pdf->Write($h, "Poursuit ses étude en  " . $classe . "   et cela pour l'année scolaire en cours  " . $as . "  \n");

// $pdf->Write($h, "La présente attestation est délivrée à l'intéressé Pour servir et valoir ce que de droit. \n");

// $pdf->Cell(0, 5, 'Fait à El Attaouia Le :' . date('d/m/Y'), 0, 1, 'C');

// Décalage de 20 mm à droite



$pdf->Ln(60);
$pdf->Cell(20);
$pdf->Cell(80, 8, "Le Président Directeur Générale", 1, 1, 'C');

// Décalage de 20 mm à droite
$pdf->Cell(20);
$pdf->Cell(80, 10, "Nom et Prénom: Ben Attia Mehdi .", 'LR', 1, 'C');
$pdf->Cell(20);


$pdf->Cell(80, 15, "La signature:", 'LR', 1, 'L'); // LR Left-Right
$pdf->Cell(20);

$pdf->Image("signature2.png", 70, 160, 30, 30);

$pdf->Cell(80, 20, " ", 'LRB', 1, 'C'); // LRB : Left-Right-Bottom (Bas)

//Afficher le pdf
$pdf->Output('', '', true);
?>

