<?php 

class produit {

	private  $id_produit = null ;
	private  $nom_produit = null;
	private  $image_produit= null;
	private  $description_produit= null;
	private  $prix_produit= null;
	private  $categorie_produit = null;

	function __construct( string $nom_produit, string $image_produit, string $description_produit, float $prix_produit, string $categorie_produit ){
			
			$this->nom_produit=$nom_produit;
			$this->image_produit=$image_produit;
			$this->description_produit=$description_produit;
			$this->prix_produit=$prix_produit;
			$this->categorie_produit=$categorie_produit;
	
		}
		function getId(): int{
			return $this->id_produit;
		}
		function getNom(): string{
			return $this->nom_produit;
		}
		function getImage(): string{
			return $this->image_produit;
		}
		function getDescription(): string{
			return $this->description_produit;
		}
		function getPrix(): float{
			return $this->prix_produit;
		}
		function getCategorie(): string{
			return $this->categorie_produit;
		}


    	function setnom(string $nom_produit): void{
			$this->nom_produit=$nom_produit;
		}
		function setimage(string $image_produit): void{
			$this->image_produit=$image_produit;
		}
		function setdescription(string $description_produit): void{
			$this->description_produit=$description_produit;
		}
		function setprix(float $prix_produit): void{
			$this->prix_produit=$prix_produit;
		}
		function setcategorie(string $categorie_produit): void{
			$this->categorie_produit=$categorie_produit;
		}

}



?>