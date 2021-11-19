<?php 

class categorie {

	private  $id_categorie = null ;
	private  $nom_categorie = null;
	

	function __construct( string $nom_categorie){
			
			$this->nom_categorie=$nom_categorie;
	
		}
		function getId(): int{
			return $this->id_categorie;
		}
		function getNom(): string{
			return $this->nom_categorie;
		}


    	function setnom(string $nom_categorie): void{
			$this->nom_categorie=$nom_categorie;
		}

}



?>