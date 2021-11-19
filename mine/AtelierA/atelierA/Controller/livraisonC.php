<?PHP
	include "../config.php";
	require_once '../model/livraison.php';

class livraisonC
{
 public function afficherlivraison()
    {  $sql= " SELECT * FROM livraison" ; 
      $db = config ::getConnexion();
      try{
        $listelivraison = $db->query($sql);
        return $listelivraison ;

      } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
    
     }

     public function ajouterlivraison($livraison)
    {
        $sql="insert into livraison (regionlivraison,adresselivraison,codepostallivraison)
        values (:regionlivraison,:adresselivraison,:codepostallivraison)";
        $db=config::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'regionlivraison'=>$livraison->getregionlivraison(),
                'adresselivraison'=>$livraison->getadresselivraison(),
                'codepostallivraison'=>$livraison->getcodepostallivraison(),
		    
                
            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
   function supprimerlivraison($codelivraison)
    {
			$sql="DELETE FROM livraison WHERE codelivraison=:codelivraison";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':codelivraison',$codelivraison);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
	}
	
 function modifierlivraison($livraison, $codelivraison){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE livraison SET 
						regionlivraison = :regionlivraison, 
						adresselivraison = :adresselivraison,
						codepostallivraison = :codepostallivraison
					 
						
					WHERE codelivraison = :codelivraison'
				);
				
				$query->bindValue(':regionlivraison',$livraison->getregionlivraison());
				$query->bindValue(':adresselivraison',$livraison->getadresselivraison());
				$query->bindValue(':codepostallivraison',$livraison->getcodepostallivraison());
				$query->bindValue(':codelivraison',$codelivraison);
				$query->execute();
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


        function recupererlivraison($codelivraison){
			$sql="SELECT * from livraison where codelivraison=$codelivraison";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$livraison=$query->fetch();
				return $livraison;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		/*JOINTURE*/
		public function afficherzone()
     {  
        $sql="SELECT livreur.zonelivreur
        FROM livreur 
            ";
                   $db = config ::getConnexion();
       try{
         $liste = $db->query($sql);
         return $liste ;
 
 
       } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
     
      }
    

}
?>