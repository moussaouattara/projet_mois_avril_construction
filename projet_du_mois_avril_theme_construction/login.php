<?php 
session_start();




$emailError = $passwordError = $email = $password = "";

if(!empty($_POST))
{
    $email         = checkInput($_POST['email']);
    $password      = checkInput($_POST['password']);
    $isSuccess     = true;


    if(empty($email)) 
        {
            $emailError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
    if(empty($password)) 
        {
            $passwordError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }



        if($isSuccess)
        {



            require("database.php");
                        $db = DataBase::connect();
                        if(isset($_POST["login"])){
                            
                            $email         = checkInput($_POST['email']);
                            $password      = checkInput($_POST['password']);
                            $password      = md5($password);
                    
                            $sql = $db->prepare("SELECT id FROM user WHERE email = ?");
                            $sql->execute(array($email));
                            $user = $sql->fetchAll(PDO::FETCH_ASSOC);

                            

                            if ($user){

                              $sql2 = $db->prepare("SELECT id FROM user WHERE password= ?");
                              $sql2->execute(array($password));
                              $user2 = $sql2->fetchAll(PDO::FETCH_ASSOC);

                              //$isPasswordCorrect = password_verify($_POST['password'], $user2['password']);

                              if ($user2){

                                foreach ($user2 as $res){

                                  $code = $res['id'];

                                }

                                $sql3 = $db->prepare("SELECT name,lastname,age,phone FROM user WHERE id = ?");
                                $sql3->execute(array($code));
                                $id = $sql3->fetchAll(PDO::FETCH_ASSOC);

                                if ($id){

                                  foreach ($id as $res1){

                                    $_SESSION['code'] = $code;
                                    $_SESSION['name'] = $res1['name'];
                                    $_SESSION['lastname'] = $res1['lastname'];
                                    $_SESSION['age'] = $res1['age'];
                                    $_SESSION['phone'] = $res1['phone'];

                                  }

                                  header('location:main.php');

                                }
                              }else{

                                echo '<div class="bg-danger text-center error"><h2>MOT DE PASSE INCORRECTE </h2></div>';

                              }

                            }else{

                              echo '<div class="bg-danger text-center error"><h2>COMPTE INEXISTANT</h2> </div>';

                            }
                            
                        }




        }

}

//$isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);



function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
/*








           //  Récupération de l'utilisateur et de son pass hashé

$req = $bdd->prepare('SELECT id, password FROM user WHERE email = :email');
$req->execute(array(
    'email' => $email));
$resultat = $req->fetch();

// Recuperation des informations de l'utilisateur ( name, lastname, ...)


$sql3 = $bdd->prepare("SELECT name,lastname,age,phone FROM user WHERE id = ?");
$sql3->execute(array($res['id']));
$id = $sql3->fetchAll(PDO::FETCH_ASSOC);


// Comparaison du pass envoyé via le formulaire avec la base


if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    if ($isPasswordCorrect) {
        $_SESSION['id'] = $res['id'];
        $_SESSION['name'] = $res['name'];
        $_SESSION['lastname'] = $res['lastname'];
        $_SESSION['age'] = $res['age'];
        $_SESSION['phone'] = $res['phone'];
        $_SESSION['email'] = $email;
        echo 'Vous êtes connecté !<br>';
        

        

        

        if (isset($_SESSION['id']) AND isset($_SESSION['email']))
            {
                echo "<script>alert('Bonjour " .$_SESSION['email'] ." Vous etes connecté')</script>";
                
            }

    }

    else 
    {
        echo 'Mauvais identifiant ou mot de passe !';
    }
}


        }
















*/

?>


















<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mon Projet du Mois d'Avril Theme : Construction</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="b.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" type="image/png" href="img/logo.png">
    </head>
    <body>
        <div class="bloc_page">
            
            <?php include('nav.php'); ?>


            <h1 style="text-align: center; font-family: Roboto, serif; color: rgb(253, 95, 22);">
                Formulaire de connexion
            </h1>



            <div class="row" style="width: 55%; margin: auto; padding-top: 2em; padding-bottom: 10em; font-size: 1.5em;">
                <div class="col-lg-10 col-lg-offset-1">
                    <form action="login.php" method="post" role="form" enctype="multipart/form-data" id="contact-form">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <label for="mail">Email :</label>
                                <input type="email" name="email" id="mail" class="form-control" placeholder="Veuillez entrer votre email svp"  style="font-size: 1.3em;">
                                <p style="color: red;"><?php echo $emailError; ?></p>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <label for="pass">Password :</label>
                                <input type="password" name="password" id="pass" class="form-control" placeholder="Veuillez entrer votre mot de passe svp"  style="font-size: 1.3em;">
                                <p style="color: red;"><?php echo $passwordError; ?></p>    
                            </div>
                            <div class="col-sm-12 col-md-12" style="padding-top: 1em;">
                                <input type="submit" name="login" value="Envoyer" class="btn btn-success"  style="font-size: 1.3em;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <?php include('footer.php'); ?>


        </div>
    </body>
</html>