<?php


include "../config.php";
    require_once '../model/offre.php';

    class offreC
    {

        
        public function ajouteroffre($offre)
        {
            $sql="INSERT INTO offre (duree,remise)
            values (:duree,:remise)";
            $db=config::getConnexion();
    
            try
            {
                $query=$db->prepare($sql);
                $query->execute([
                    'duree'=>$offre->get_duree(),
                    'remise'=>$offre->getremise(),
                    
                    
                ]);
            }
            catch(Exeption $e)
            {
                die('Erreur: '.$e->getMessage());
            }
        }
        public function afficheroffre()
        {  $sql= " SELECT * FROM offre" ; 
          $db = config ::getConnexion();
          try{
            $listeoffre = $db->query($sql);
            return $listeoffre ;
        
          } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
        
         }
        
        
        
        function supprimeroffre($id)
        {
                $sql="DELETE FROM offre WHERE id= :id";
                $db = config::getConnexion();
                $req=$db->prepare($sql);
                $req->bindValue(':id',$id);
                try{
                    $req->execute();
                }
                catch (Exception $e){
                    die('Erreur: '.$e->getMessage());
                }
        }
    


        function modifieroffre($offre, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE offre SET 
						duree = :duree, 
						remise = :remise
						
						
					WHERE id = :id'
				);
				
				$query->bindValue(':duree',$offre->get_duree());
				$query->bindValue(':remise',$offre->getremise());
				
				$query->bindValue(':id',$id);
				$query->execute();
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


        function recupereroffre($id){
			$sql="SELECT * from offre where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$offre=$query->fetch();
				return $offre;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

        public function afficheroffretri()
        {  $sql= " SELECT * FROM offre order by remise  " ; 
          $db = config ::getConnexion();
          try{
            $listeoffre = $db->query($sql);
            return $listeoffre ;
    
          } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
        
         }	

    
    }


?>