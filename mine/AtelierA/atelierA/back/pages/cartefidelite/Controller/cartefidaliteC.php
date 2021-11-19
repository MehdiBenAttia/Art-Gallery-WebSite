<?PHP
	include "../config.php";
	require_once '../model/cartefidalite.php';

class cartefidaliteC
{
 public function affichercartefidalite()
    {  $sql= " SELECT * FROM cartefidalite" ; 
      $db = config ::getConnexion();
      try{
        $listecartefidalite = $db->query($sql);
        return $listecartefidalite ;

      } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
    
     }

    

	public function ajoutercartefidalite($cartefidalite)
    {
        $sql="insert into cartefidalite (num_cartefidalite,nom_cartefidalite,prenom_cartefidalite,date_cartefidalite)
        values (:num_cartefidalite,:nom_cartefidalite,:prenom_cartefidalite,:date_cartefidalite)";
        $db=config::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'num_cartefidalite'=>$cartefidalite->getnum_cartefidalite(),
                'nom_cartefidalite'=>$cartefidalite->getnom_cartefidalite(),
                'prenom_cartefidalite'=>$cartefidalite->getprenom_cartefidalite(),
                'date_cartefidalite'=>$cartefidalite->getdate_cartefidalite(),
            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
	
	
	
	
	
   function supprimercartefidalite($id_cartefidalite)
    {
			$sql="DELETE FROM cartefidalite WHERE id_cartefidalite=:id_cartefidalite";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_cartefidalite',$id_cartefidalite);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
	}
	
	function modifiecartefidalite($cartefidalite, $id_cartefidalite){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE cartefidalite SET 
						nom_cartefidalite = :nom_cartefidalite, 
						prenom_cartefidalite = :prenom_cartefidalite,
						date_cartefidalite = :date_cartefidalite,
						num_cartefidalite = :num_cartefidalite
						
					WHERE id_cartefidalite = :id_cartefidalite'
				);
				
				$query->bindValue(':nom_cartefidalite',$cartefidalite->getnom_cartefidalite());
				$query->bindValue(':prenom_cartefidalite',$cartefidalite->getprenom_cartefidalite());
				$query->bindValue(':date_cartefidalite',$cartefidalite->getdate_cartefidalite());
				$query->bindValue(':num_cartefidalite',$cartefidalite->getnum_cartefidalite());
				
				$query->bindValue(':id_cartefidalite',$id_cartefidalite);
				$query->execute();
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


        function recuperercartefidalite($id_cartefidalite){
			$sql="SELECT * from cartefidalite where id_cartefidalite=$id_cartefidalite";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$cartefidalite=$query->fetch();
				return $cartefidalite;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
	
	
	
	
	
	
	
	/* function modifiercarte_fidalite($carte_fidalite, $numcarte_fidalite){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE carte_fidalite SET 
                    emailcarte_fidalite = :emailcarte_fidalite, 
                    messagecarte_fidalite = :messagecarte_fidalite,
                    
                WHERE numcarte_fidalite = :numcarte_fidalite'
            );
            $query->execute([
               'regioncarte_fidalite'=>$carte_fidalite->getregioncarte_fidalite(),
                'adressecarte_fidalite'=>$carte_fidalite->getadressecarte_fidalite(),
                'codepostalcarte_fidalite'=>$carte_fidalite->getcodepostalcarte_fidalite(),
                'codecarte_fidalite' => $codecarte_fidalite
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
/*function recuperercarte_fidalite($codecarte_fidalite){
        $sql="SELECT * from carte_fidalite where codecarte_fidalite=$codecarte_fidalite";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $album=$query->fetch();
            return $carte_fidalite;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function recuperercarte_fidalite1($codecarte_fidalite){
            $sql="SELECT * from livaison where codecarte_fidalite=$codecarte_fidalite";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                
                $user = $query->fetch(PDO::FETCH_OBJ);
                return $carte_fidalite;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }*/


}
?>