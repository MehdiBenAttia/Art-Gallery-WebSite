<?PHP
	include "../config.php";
    require_once '../model/promotion.php';

    class promotionC
    {

        
        public function ajouterpromotion($promotion)
        {
            $sql="INSERT INTO promotion (titre,pourcentage,image)
            values (:titre,:pourcentage,:image)";
            $db=config::getConnexion();
    
            try
            {
                $query=$db->prepare($sql);
                $query->execute([
                    'titre'=>$promotion->get_titre(),
                    'pourcentage'=>$promotion->getpourcentage(),
                    'image'=>$promotion->getimage(),
                    
                ]);
            }
            catch(Exeption $e)
            {
                die('Erreur: '.$e->getMessage());
            }
        }
        public function afficherpromotion()
        {  $sql= " SELECT * FROM promotion" ; 
          $db = config ::getConnexion();
          try{
            $listepromotion = $db->query($sql);
            return $listepromotion ;
        
          } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
        
         }
        
        
        
        function supprimerpromotion($id)
        {
                $sql="DELETE FROM promotion WHERE id= :id";
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


        function modifierpromotion($promotion, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE promotion SET 
						titre = :titre, 
						pourcentage = :pourcentage,
						image = :image
						
					WHERE id = :id'
				);
				
				$query->bindValue(':titre',$promotion->get_titre());
				$query->bindValue(':pourcentage',$promotion->getpourcentage());
				$query->bindValue(':image',$promotion->getimage());
				$query->bindValue(':id',$id);
				$query->execute();
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


        function recupererpromotion($id){
			$sql="SELECT * from promotion where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$promotion=$query->fetch();
				return $promotion;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
    
    
    }

?>