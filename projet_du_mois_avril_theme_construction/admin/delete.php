<?php
    require '../database.php';
 
    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

    if(!empty($_POST)) 
    {
        $id = checkInput($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM items WHERE id = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: index.php"); 
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mon Projet du Mois d'Avril Theme : Construction</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" type="image/png" href="../img/logo.png">
        <link href="../b.css" rel="stylesheet">
    </head>
    <body style="background-image: url('https://mdbootstrap.com/img/Photos/Others/architecture.jpg');background-attachment: fixed;background-repeat:  no-repeat;background-size:  cover;font-family: Roboto, serif;">
        <div>
        <?php include('../menu.php'); ?>
        </div>




        <div class="container admin">
            <div class="row">
                <h1><strong>Supprimer un item</strong></h1>
                <br>
                <form class="form" action="delete.php" role="form" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>"/>
                    <p class="alert alert-warning">Etes vous sur de vouloir supprimer ?</p>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-warning">Oui</button>
                      <a class="btn btn-default" href="index.php">Non</a>
                    </div>
                </form>
            </div>
        </div>






    </body>
</html>