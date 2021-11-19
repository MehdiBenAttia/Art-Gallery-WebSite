<?PHP
	include "../config.php";
	 require_once '../Model/produit.php';

class produitC
{
 public function afficherProduit()
    {  $sql= " SELECT * FROM produit" ; 
      $db = config ::getConnexion();
      try{
        $listeproduit = $db->query($sql);
        return $listeproduit ;

      } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
    
     }

     public function ajouterProduit($produit)
    {
        $sql="INSERT INTO produit (nom_produit,image_produit,description_produit,prix_produit,categorie_produit)
        values (:nom_produit,:image_produit,:description_produit,:prix_produit,:categorie_produit)";
        $db=config::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'nom_produit'=>$produit->getNom(),
                'image_produit'=>$produit->getImage(),
                'description_produit'=>$produit->getDescription(),
                'prix_produit'=>$produit->getPrix(),
                'categorie_produit'=>$produit->getCategorie(),
                
            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function supprimerProduit($id_produit)
    {
			$sql="DELETE FROM produit WHERE id_produit= :id_produit";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_produit',$id_produit);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
	}

    function modifierProduct($produit, $id_produit){
        // try {
        //     $db = config::getConnexion();
        //     $query = $db->prepare(
        //         'UPDATE produit SET 
        //             nom_produit = :nom_produit, 
        //             image_produit = :image_produit,
        //             description_produit = :description_produit,
        //             prix_produit = :prix_produit,
        //             categorie_produit = :categorie_produit

                    
        //         WHERE id_produit = :id_produit'
        //     );
            
        //     $query->bindValue(':nom_produit',$produit->getNom());
        //     $query->bindValue(':image_produit',$produit->getImage());
        //     $query->bindValue(':description_produit',$produit->getDescription());
        //     $query->bindValue(':prix_produit',$produit->getPrix());
        //     $query->bindValue(':categorie_produit',$produit->getCategorie());
        //     $query->bindValue(':id_produit',$id_produit);
        //     $query->execute();
        //     echo $query->rowCount() . " records UPDATED successfully <br>";
        // } catch (PDOException $e) {
        //     $e->getMessage();
        // }
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE produit SET 
                    nom_produit = :nom_produit, 
                    image_produit = :image_produit,
                    description_produit = :description_produit,
                    prix_produit = :prix_produit,
                    categorie_produit = :categorie_produit
                WHERE id_produit = :id_produit'
            );
            $query->execute([
                'nom_produit' => $produit->getNom(),
                'image_produit' => $produit->getImage(),
                'description_produit' => $produit->getDescription(),
                'prix_produit' => $produit->getPrix(),
                'categorie_produit' => $produit->getCategorie(),
                'id_produit' => $id_produit
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    function recupererProduit($id_produit){
        $sql="SELECT * from produit where id_produit=$id_produit";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
            $produit=$query->fetch();
            return $produit;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }



    function rechercher($input,$colonne) {
        if($colonne == "all") 
        {        $sql = "SELECT * from produit WHERE ( nom_produit LIKE \"%$input%\") OR ( id_produit LIKE \"%$input%\") OR ( prix_produit LIKE \"%$input%\") ";
       } else {
   $sql = "SELECT * from produit WHERE ( $colonne LIKE \"%$input%\")  "; }
   $db = config::getConnexion();
   try { $liste=$db->query($sql); 
    

       return $liste;
   }
   catch (PDOException $e) {
       $e->getMessage();
   }


}



public function afficherCategorie()
     {  
        $sql="SELECT categorie.nom_categorie 
        FROM categorie 
            ";
                   $db = config ::getConnexion();
       try{
         $liste = $db->query($sql);
         return $liste ;
 
 
       } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
     
      }























}
?>