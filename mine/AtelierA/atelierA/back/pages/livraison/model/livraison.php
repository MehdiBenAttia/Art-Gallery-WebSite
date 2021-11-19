<?php 

class livraison {

	private  $codelivraison = null ;
	private  $regionlivraison = null;
	private  $adresselivraison= null;
	private  $codepostallivraison = null;



function __construct( string $regionlivraison, string $adresselivraison, int $codepostallivraison ){
			
			$this->regionlivraison=$regionlivraison;
			$this->adresselivraison=$adresselivraison;
			$this->codepostallivraison=$codepostallivraison;
		   
		}
		function getcodelivraison(): int{
			return $this->codelivraison;
		}
		function getregionlivraison(): string{
			return $this->regionlivraison;
		}
		function getadresselivraison(): string{
			return $this->adresselivraison;
		}
		function getcodepostallivraison(): int{
			return $this->codepostallivraison;
		}
		

    function setregionlivraison(string $regionlivraison): void{
			$this->regionlivraison=$regionlivraison;
		}
		function setadresselivraison(string $adresselivraison): void{
			$this->adresselivraison=$adresselivraison;
		}
		function setcodepostallivraison(int $codepostallivraison): void{
			$this->codepostallivraison=$codepostallivraison;
			}
   
}



?>