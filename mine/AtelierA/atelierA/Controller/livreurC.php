<?PHP
	include "../config.php";
	require_once '../model/livreur.php';

class livreurC
{
 public function afficherlivreur()
    {  $sql= " SELECT * FROM livreur" ; 
      $db = config ::getConnexion();
      try{
        $listelivreur = $db->query($sql);
        return $listelivreur ;

      } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
    
     }

     public function ajouterlivreur($livreur)
    {
        $sql="insert into livreur (nomlivreur,prenomlivreur,zonelivreur,vehiculelivreur)
        values (:nomlivreur,:prenomlivreur,:zonelivreur,:vehiculelivreur)";
        $db=config::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'nomlivreur'=>$livreur->getnomlivreur(),
                'prenomlivreur'=>$livreur->getprenomlivreur(),
                'zonelivreur'=>$livreur->getzonelivreur(),
                'vehiculelivreur'=>$livreur->getvehiculelivreur(),
            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
   function supprimerlivreur($idlivreur)
    {
			$sql="DELETE FROM livreur WHERE idlivreur=:idlivreur";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idlivreur',$idlivreur);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
	}
	
function modifierlivreur($livreur, $idlivreur){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE livreur SET 
						nomlivreur = :nomlivreur, 
						prenomlivreur = :prenomlivreur,
						zonelivreur = :zonelivreur,
						vehiculelivreur = :vehiculelivreur
						
					WHERE idlivreur = :idlivreur'
				);
				
				$query->bindValue(':nomlivreur',$livreur->getnomlivreur());
				$query->bindValue(':prenomlivreur',$livreur->getprenomlivreur());
				$query->bindValue(':zonelivreur',$livreur->getzonelivreur());
				$query->bindValue(':vehiculelivreur',$livreur->getvehiculelivreur());

				$query->bindValue(':idlivreur',$idlivreur);
				$query->execute();
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


        function recupererlivreur($idlivreur){
			$sql="SELECT * from livreur where idlivreur=$idlivreur";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$livreur=$query->fetch();
				return $livreur;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}



}
?>