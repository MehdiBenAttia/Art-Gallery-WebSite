<?PHP
	include "../config1.php";
	 require_once '../Model/categorie.php';

class categorieC
{
 public function afficherCategorie()
    {  $sql= " SELECT * FROM categorie" ; 
      $db = config1 ::getConnexion();
      try{
        $listecategorie = $db->query($sql);
        return $listecategorie ;

      } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
    
     }

     public function ajoutercategorie($categorie)
    {
        $sql="INSERT INTO categorie (nom_categorie)
        values (:nom_categorie)";
        $db=config1::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'nom_categorie'=>$categorie->getNom(),
                
                
            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function supprimercategorie($id_categorie)
    {
			$sql="DELETE FROM categorie WHERE id_categorie= :id_categorie";
			$db = config1::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_categorie',$id_categorie);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
	}

    function modifierCategorie($categorie, $id_categorie){
        try {
            $db = config1::getConnexion();
            $query = $db->prepare(
                'UPDATE categorie SET 
                    nom_categorie = :nom_categorie

                WHERE id_categorie = :id_categorie'
            );

            $query->bindValue(':nom_categorie',$categorie->getNom());
            $query->bindValue(':id_categorie',$id_categorie);
            $query->execute();
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    function recupererCategorie($id_categorie){
        $sql="SELECT * from categorie where id_categorie=$id_categorie";
        $db = config1::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
            $categorie=$query->fetch();
            return $categorie;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }




























    



}
?>