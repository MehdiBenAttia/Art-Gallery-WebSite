<?php 

class promotion {

	private  $id = null ;
	private  $titre = null;
	private  $pourcentage= null;
	private  $image = null;

function __construct( string $titre, string $pourcentage, string $image){
			
			$this->titre=$titre;
			$this->pourcentage=$pourcentage;
			$this->image=$image;
		
		}
		function getid(): int{
			return $this->id;
		}
		function get_titre(): string{
			return $this->titre;
		}
		function getpourcentage(): string{
			return $this->pourcentage;
		}
		function getimage(): string{
			return $this->image;
		}
    function settitre(string $titre): void{
			$this->titre=$titre;
		}
		function setpourcentage(string $pourcentage): void{
			$this->pourcentage=$pourcentage;
		}
		function setimage(string $image): void{
			$this->image=$image; }




}



?>




<!-- <div class="form-group">
                      <label for="titre">titre</label>
                      <input type="text" name="titre" class="form-control"  id="titre" placeholder="titre" > 
                      
                      
                    </div>
                    
                    <div class="form-group">
                      <label for="pourcentage"> pourcentage</label>
                      <input type="number"  name="pourcentage" class="form-control"   id="pourcentage"   placeholder="pourcentage " >
                      
                    </div>
                    <div class="form-group">
                    <label for ="article"> Article </label>
                  <tr> <td> <input type="file" name="image" id="image" maxlength="250" > </td>
                    </div> -->