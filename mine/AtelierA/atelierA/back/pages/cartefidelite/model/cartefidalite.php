<?php 

class cartefidalite {
    private  $id_cartefidalite= null;
	private  $num_cartefidalite = null ;
	private  $nom_cartefidalite = null;
	private  $prenom_cartefidalite = null;
	private  $date_cartefidalite = null;

function __construct( int $num_cartefidalite,string $nom_cartefidalite, string $prenom_cartefidalite, string $date_cartefidalite){
			
			$this->num_cartefidalite=$num_cartefidalite;
			$this->nom_cartefidalite=$nom_cartefidalite;
			$this->prenom_cartefidalite=$prenom_cartefidalite;
			$this->date_cartefidalite=$date_cartefidalite;
		
		}
		function getid_cartefidalite(): int{
			return $this->id_cartefidalite;
		}
		function getnum_cartefidalite(): int{
			return $this->num_cartefidalite;
		}
		function getnom_cartefidalite(): string{
			return $this->nom_cartefidalite;
		}
		function getprenom_cartefidalite(): string{
			return $this->prenom_cartefidalite;
		}
		function getdate_cartefidalite(): string{
			return $this->date_cartefidalite;
		}
		function setdate_cartefidalite(string $date_cartefidalite): void{
			$this->date_cartefidalite=$date_cartefidalite;
		}
    function setnum_cartefidalite(int $num_cartefidalite): void{
			$this->num_cartefidalite=$num_cartefidalite;
		}
		function setnom_cartefidalite(string $nom_cartefidalite): void{
			$this->nom_cartefidalite=$nom_cartefidalite;
		}
		function setprenom_cartefidalite(string $prenom_cartefidalite): void{
			$this->prenom_cartefidalite=$prenom_cartefidalite; }




}



?>