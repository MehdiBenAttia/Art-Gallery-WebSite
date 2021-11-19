<?PHP
	include "../config.php";
	 require_once '../model/utilisateur.php';

class utilisateurC
{
 public function afficherutilisateur()
    {  $sql= " SELECT * FROM utilisateur" ; 
      $db = config::getConnexion();
      try{
        $listeutilisateur = $db->query($sql);
        return $listeutilisateur ;

      } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
    
     }

     public function ajouterutilisateur($utilisateur)
    {
        $sql="insert into utilisateur (nomutilisateur,prenomutilisateur,telephoneutilisateur,dateutilisateur,loginutilisateur,mdputilisateur)
        values (:nomutilisateur,:prenomutilisateur,:telephoneutilisateur,:dateutilisateur,:loginutilisateur,:mdputilisateur)";
        $db=config::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'nomutilisateur'=>$utilisateur->getnomutilisateur(),
              'prenomutilisateur'=>$utilisateur->getprenomutilisateur(),
            'telephoneutilisateur'=>$utilisateur->gettelephoneutilisateur(),
                'dateutilisateur'=>$utilisateur->getdateutilisateur(),
                 'loginutilisateur'=>$utilisateur->getloginutilisateur(),                                                                  
                   'mdputilisateur'=>$utilisateur->getmdputilisateur(),




            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function supprimerutilisateur($idutilisateur)
    {
			$sql="DELETE FROM utilisateur WHERE idutilisateur= :idutilisateur";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idutilisateur',$idutilisateur);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
	}
 function modifierutilisateur($utilisateur, $idutilisateur){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE utilisateur SET 
                    nomutilisateur = :nomutilisateur, 
                    prenomutilisateur = :prenomutilisateur,
                    telephoneutilisateur = :telephoneutilisateur,
                    dateutilisateur = :dateutilisateur,
                    loginutilisateur= :loginutilisateur,
                    mdputilisateur= :mdputilisateur
                WHERE idutilisateur = :idutilisateur'
            );
            $query->execute([
                'nomutilisateur'=>$utilisateur->getnomutilisateur(),
              'prenomutilisateur'=>$utilisateur->getprenomutilisateur(),
            'telephoneutilisateur'=>$utilisateur->gettelephoneutilisateur(),
                'dateutilisateur'=>$utilisateur->getdateutilisateur(),
                
                 'loginutilisateur'=>$utilisateur->getloginutilisateur(),                                                                    'mdputilisateur'=>$utilisateur->getmdputilisateur(),
                'idutilisateur' => $idutilisateur
            ]);
            echo $query->rowCount() .'alerte("records UPDATED successfully <br>")';
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
     function recupererutilisateur($idutilisateur){
        $sql="SELECT * from utilisateur where idutilisateur=$idutilisateur";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $utilisateur=$query->fetch();
            return $utilisateur;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function recupererutilisateur1($idutilisateur){
            $sql="SELECT * from utilisateur where idutilisateur=$idutilisateur";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                
                $utilisateur = $query->fetch(PDO::FETCH_OBJ);
                return $utilisateur;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
}
?>