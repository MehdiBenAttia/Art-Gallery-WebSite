<?php 

class livreur {

	private  $idlivreur = null ;
	private  $nomlivreur = null;
	private  $prenomlivreur= null;
	private  $zonelivreur = null;
	private  $vehiculelivreur = null;

function __construct( string $nomlivreur, string $prenomlivreur, string $zonelivreur , string $vehiculelivreur){
			
			$this->nomlivreur=$nomlivreur;
			$this->prenomlivreur=$prenomlivreur;
			$this->zonelivreur=$zonelivreur;
			$this->vehiculelivreur=$vehiculelivreur;
		
		}
		function getidlivreur(): int{
			return $this->idlivreur;
		}
		function getnomlivreur(): string{
			return $this->nomlivreur;
		}
		function getprenomlivreur(): string{
			return $this->prenomlivreur;
		}
		function getzonelivreur(): string{
			return $this->zonelivreur;
		}
		function getvehiculelivreur(): string{
			return $this->vehiculelivreur;
		}
    function setnomlivreur(string $nomlivreur): void{
			$this->nomlivreur=$nomlivreur;
		}
	function setprenomlivreur(string $prenomlivreur): void{
			$this->prenomlivreur=$prenomlivreur;
		}	
		function setzonelivreur(string $zonelivreur): void{
			$this->zonelivreur=$zonelivreur;
		}
		function setvehiculelivreur(int $vehiculelivreur): void{
			$this->vehiculelivreur=$vehiculelivreur; }




}



?>