 <?php
    include_once '../Model/article.php';
    include_once '../Controller/articleC.php';

    $error = "";

    // create user
    $article = null;

    // create an instance of the controller
    $articleC = new articleC();
    if (
        isset($_POST["titrearticle"]) && 
        isset($_POST["descarticle"]) &&
        isset($_POST["imagearticle"])
    ) {
        if (
            !empty($_POST["titrearticle"]) && 
            !empty($_POST["descarticle"]) && 
            !empty($_POST["imagearticle"])
        ) 
            {
            $article = new article(
                $_POST['titrearticle'],
                $_POST['descarticle'], 
                $_POST['imagearticle'],
              
            );
            $articleC->ajouterarticle($article);
            header('Location:showarticle.php');
        }
        else
            $error = "Missing information";
    } 
    ?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="showAlbums.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
         <form action="" method="POST">
            <table border="1" align="center">
               <tr> <td> 
                <label>Title</label>
                 </td> </tr>
                 <tr>
                 <td> <input type="text" name="titrearticle" id="titrearticle" maxlength="50"> </td> </tr>
                 <tr > <td> <label> description </label></td> </tr>
                 <tr> <td> <input type="string" name="descarticle" id="descarticle" maxlength="50"> </td> </tr>
                 <tr><td> <label> Image </label></td> </tr>
                  <tr> <td> <input type="file" name="imagearticle" id="imagearticle" maxlength="250" > </td>
                </tr>
                <tr> <td> <input type="submit" name="submit" value="submit"></td></tr>
            </table>
        </form>

    </body>
    </html>