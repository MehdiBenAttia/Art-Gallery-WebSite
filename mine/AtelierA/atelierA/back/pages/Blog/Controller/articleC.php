<?PHP
	include "../config.php";
	 require_once '../model/article.php';

class articleC
{
 public function afficherarticle()
    {  $sql= " SELECT * FROM article" ; 
      $db = config::getConnexion();
      try{
        $listearticle = $db->query($sql);
        return $listearticle ;

      } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
    
     }

     public function ajouterarticle($article)
    {
        $sql="insert into article (titrearticle,descarticle,imagearticle)
        values (:titrearticle,:descarticle,:imagearticle)";
        $db=config::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'titrearticle'=>$article->gettitrearticle(),
                'descarticle'=>$article->getdescarticle(),
                'imagearticle'=>$article->getimagearticle(),
                
            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function supprimerarticle($idarticle)
    {
			$sql="DELETE FROM article WHERE idarticle= :idarticle";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idarticle',$idarticle);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
	}

       function modifierarticle($article, $idarticle){
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                    'UPDATE article SET 
                        titrearticle = :titrearticle, 
                        descarticle = :descarticle,
                        imagearticle = :imagearticle
                        
                    WHERE idarticle = :idarticle'
                );
                
                $query->bindValue(':titrearticle',$article->gettitrearticle());
                $query->bindValue(':descarticle',$article->getdescarticle());
                $query->bindValue(':imagearticle',$article->getimagearticle());
                $query->bindValue(':idarticle',$idarticle);
                $query->execute();
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }


        function recupererarticle($idarticle){
            $sql="SELECT * from article where idarticle=$idarticle";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();

                $article=$query->fetch();
                return $article;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
       
        
    }





?>