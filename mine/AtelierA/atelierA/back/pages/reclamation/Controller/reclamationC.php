<?PHP
	include "../config.php";
	require_once '../model/reclamation.php';

class reclamationC
{
 public function afficherreclamation()
    {  $sql= " SELECT * FROM reclamation" ; 
      $db = config ::getConnexion();
      try{
        $listereclamation = $db->query($sql);
        return $listereclamation ;

      } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
    
     }

     public function ajouterreclamation($reclamation)
    {
        $sql="insert into reclamation (emailreclamation,messagereclamation)
        values (:emailreclamation,:messagereclamation)";
        $db=config::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'emailreclamation'=>$reclamation->getemailreclamation(),
                'messagereclamation'=>$reclamation->getmessagereclamation(),
                
                
            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
   function supprimerreclamation($numreclamation)
    {
			$sql="DELETE FROM reclamation WHERE numreclamation=:numreclamation";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':numreclamation',$numreclamation);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
	}

	
	
	
	function modifiereclamation($reclamation, $numreclamation){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reclamation SET 
						emailreclamation = :emailreclamation, 
						messagereclamation = :messagereclamation
						
						
					WHERE numreclamation = :numreclamation'
				);
				
				$query->bindValue(':emailreclamation',$reclamation->getemailreclamation());
				$query->bindValue(':messagereclamation',$reclamation->getmessagereclamation());
				
				$query->bindValue(':numreclamation',$numreclamation);
				$query->execute();
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


        function recupererreclamation($numreclamation){
			$sql="SELECT * from reclamation where numreclamation=$numreclamation";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reclamation=$query->fetch();
				return $reclamation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
	
	public function afficherreclamationtri()
    {  $sql= " SELECT * FROM reclamation order by numreclamation DESC " ; 
      $db = config ::getConnexion();
      try{
        $listereclamation = $db->query($sql);
        return $listereclamation ;

      } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
    
     }
			   
 
	
	
	
	
	/* function modifierreclamation($reclamation, $numreclamation){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamation SET 
                    emailreclamation = :emailreclamation, 
                    messagereclamation = :messagereclamation,
                    
                WHERE numreclamation = :numreclamation'
            );
            $query->execute([
               'regionreclamation'=>$reclamation->getregionreclamation(),
                'adressereclamation'=>$reclamation->getadressereclamation(),
                'codepostalreclamation'=>$reclamation->getcodepostalreclamation(),
                'codereclamation' => $codereclamation
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
/*function recupererreclamation($codereclamation){
        $sql="SELECT * from reclamation where codereclamation=$codereclamation";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $album=$query->fetch();
            return $reclamation;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function recupererreclamation1($codereclamation){
            $sql="SELECT * from livaison where codereclamation=$codereclamation";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                
                $user = $query->fetch(PDO::FETCH_OBJ);
                return $reclamation;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }*/


}
?>