<?php 

class offre {

	private  $id = null ;
	private  $duree = null;
	private  $remise= null;

function __construct( string $duree, string $remise){
			
			$this->duree=$duree;
			$this->remise=$remise;
		
		}
		function getid(): int{
			return $this->id;
		}
		function get_duree(): string{
			return $this->duree;
		}
		function getremise(): string{
			return $this->remise;
		}
		
    function setduree(string $duree): void{
			$this->duree=$duree;
		}
		
		function setremise(string $remise): void{
			$this->remise=$remise; }




}



?>