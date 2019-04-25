<?php
     session_start();
    require 'database.php';
 
    $nameError = $lastnameError = $ageError = $emailError = $passwordError = $phoneError = $communeError = $name = $lastname = $age = $email = $password = $phone = $commune = "";

    if(!empty($_POST)) 
    {
        $name               = checkInput($_POST['name']);
        $lastname           = checkInput($_POST['lastname']);
        $age                = checkInput($_POST['age']);
        $email              = checkInput($_POST['email']);
        $password           = md5($_POST['password']);
        $phone              = checkInput($_POST['phone']);
        $commune            = checkInput($_POST['commune']); 
        $isSuccess          = true;
        
        if(empty($name)) 
        {
            $nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($lastname)) 
        {
            $lastnameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($age)) 
        {
            $ageError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
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
        if(empty($phone)) 
        {
            $phoneError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($commune)) 
        {
            $communeError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
       
        
        
        if($isSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO user (name,lastname,age,email,password,phone,commune) values(?, ?, ?, ?, ?, ?, ?)");
            $statement->execute(array($name,$lastname,$age,$email,$password,$phone,$commune));
            Database::disconnect();
            
            echo '<div class="bg-success text-center"><h2>Insertion Reussie</h2> </div>';
        }

        else
        {
            echo '<div class="bg-danger text-center error"><h2>Echec de l insertion</h2> </div>';
        }
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
        <link href="b.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" type="image/png" href="img/logo.png">
    </head>
    <body>
        <div class="bloc_page">


            <header>
                    <?php include('nav.php'); ?>
            </header>



            <h1 style="text-align: center; font-family: Roboto, serif; color: rgb(253, 95, 22);">
                Formulaire d'inscription
            </h1>


            <div class="row"  style="width: 60%; margin: auto; padding-top: 3em; font-size: 1.5em;">
                <div class="col-lg-10 col-lg-offset-1">
                    <form id="contact-form" method="post" action="form.php" role="form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <label for="nom">Nom :</label>
                                <input type="text" name="name" id="nom" class="form-control" placeholder="Veuillez entrer votre nom svp" style="font-size: 1.3em;">
                                <p style="color: red;"><?php echo $nameError; ?></p>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <label for="prenom">Prenom :</label>
                                <input type="text" name="lastname" id="prenom" class="form-control" placeholder="Veuillez entrer votre prenom svp"  style="font-size: 1.3em;">
                                <p style="color: red;"><?php echo $lastnameError; ?></p>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <label for="age">Age :</label>
                                <input type="number" name="age" id="age" class="form-control" placeholder="Veuillez entrer votre age svp"  style="font-size: 1.3em;">
                                <p style="color: red;"><?php echo $ageError; ?></p>
                            </div>
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
                            <div class="col-sm-12 col-md-12">
                                <label for="telephone">Telephone :</label>
                                <input type="number" name="phone" id="telephone" class="form-control" placeholder="Veuillez entrer votre numero de telephone svp"  style="font-size: 1.3em;">
                                <p style="color: red;"><?php echo $phoneError; ?></p>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <label for="comm">Commune :</label>
                                <input type="text" name="commune" id="comm" class="form-control" placeholder="Veuillez entrer votre commune svp"  style="font-size: 1.3em";>
                                <p style="color: red;"><?php echo $communeError; ?></p>
                            </div><br>
                            <div class="col-sm-12 col-md-12">
                                <input type="submit" value="Envoyer" class="btn btn-success"  style="font-size: 1.3em;">
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>



         <?php include('footer.php'); ?>


        </div>
    </body>
</html>