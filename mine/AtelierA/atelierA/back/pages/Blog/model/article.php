<?php 

class article {

	private  $idarticle = null ;
	private  $titrearticle = null;
		private  $descarticle= null;
		private  $imagearticle = null;

function __construct( string $titrearticle, string $descarticle, string $imagearticle){
			
			$this->titrearticle=$titrearticle;
			$this->descarticle=$descarticle;
			$this->imagearticle=$imagearticle;
		
		}
		function getIdarticle(): int{
			return $this->idarticle;
		}
		function gettitrearticle(): string{
			return $this->titrearticle;
		}
		function getdescarticle(): string{
			return $this->descarticle;
		}
		function getimagearticle(): string{
			return $this->imagearticle;
		}
    function settitrearticle(string $titrearticle): void{
			$this->titrearticle=$titrearticle;
		}
		function setdescarticle(string $descarticle): void{
			$this->descarticle;
		}
		function setimagearticle(string $imagearticle): void{
			$this->imagearticle=$imagearticle; }




}



?>