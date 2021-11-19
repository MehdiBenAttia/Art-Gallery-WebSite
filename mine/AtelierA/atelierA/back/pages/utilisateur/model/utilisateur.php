<?php 

class utilisateur {

	private  $idutilisateur = null ;
	private  $nomutilisateur = null;
	private  $prenomutilisateur= null;
		private  $telephoneutilisateur= null;
				private  $dateutilisateur= null;
				private  $loginutilisateur= null;
				private  $mdputilisateur= null;




function __construct( string $nomutilisateur, string $prenomutilisateur ,int $telephoneutilisateur,string $dateutilisateur,string $loginutilisateur,string $mdputilisateur){
			
			$this->nomutilisateur=$nomutilisateur;
			$this->prenomutilisateur=$prenomutilisateur;
					$this->telephoneutilisateur=$telephoneutilisateur;
										$this->dateutilisateur=$dateutilisateur;	      
													$this->loginutilisateur=$loginutilisateur;
										$this->mdputilisateur=$mdputilisateur;



		}
		function getIdutilisateur(): int{
			return $this->idutilisateur;
		}
		function getnomutilisateur(): string{
			return $this->nomutilisateur;
		}
		function getprenomutilisateur(): string{
			return $this->prenomutilisateur;
		}
		function gettelephoneutilisateur(): int{
			return $this->telephoneutilisateur;
		}
		function getdateutilisateur(): string{
			return $this->dateutilisateur;
		}
		function getloginutilisateur(): string{
			return $this->loginutilisateur;
		}
		function getmdputilisateur(): string{
			return $this->mdputilisateur;
		}
    function setnomutilisateur(string $nomutilisateur): void{
			$this->nomutilisateur=$nomutilisateur;
		}
		function setprenomutilisateur(string $prenomutilisateur): void{
			$this->prenomutilisateur;
		}
	function settelephoneutilisateur(int $telephoneutilisateur): void{
			$this->telephoneutilisateur;
		}
function setdateutilisateur(string $dateutilisateur): void{
			$this->dateutilisateur;
		}
function setloginutilisateur(string $loginutilisateur): void{
			$this->loginutilisateur;
		}
function setmdputilisateur(string $mdputilisateur): void{
			$this->mdputilisateur;
		}


}



?>