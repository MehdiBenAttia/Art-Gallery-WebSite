<?php 

class reclamation {
    private  $numreclamation= null;
	private  $emailreclamation = null ;
	private  $messagereclamation = null;
	
	

function __construct( string $messagereclamation, string $emailreclamation){
			
			
			$this->emailreclamation=$emailreclamation;
			$this->messagereclamation=$messagereclamation;
		
		}
		function getnumreclamation(): int{
			return $this->numreclamation;
		}
		function getemailreclamation(): string{
			return $this->emailreclamation;
		}
		function getmessagereclamation(): string{
			return $this->messagereclamation;
		}
		
    function setemailreclamation(string $emailreclamation): void{
			$this->emailreclamation=$emailreclamation;
		}
		function setmessagereclamation(string $messagereclamation): void{
			$this->messagereclamation=$messagereclamation;
		}
		function setnumreclamation(int $numreclamation): void{
			$this->numreclamation=$numreclamation; }

	  




}



?>