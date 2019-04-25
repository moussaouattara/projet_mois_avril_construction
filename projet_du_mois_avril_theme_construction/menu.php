<?php
session_start();



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


    <div style="background-image: url('https://mdbootstrap.com/img/Photos/Others/architecture.jpg');background-attachment: fixed;background-repeat:  no-repeat;background-size:  cover;font-family: Roboto, serif;">

<div class="row">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" datta-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#">
                <div class="row">
                    <div class="col-md-12 nom" style="padding-top: 1em; padding-left: 2em;">
                        <?php
                            echo $_SESSION['name'].' '.$_SESSION['lastname'];
                        ?>
                    </div>
                </div>
            </a>
        </div>
        <div class="navbar-collapse collapse navbar-right elementMenu" id="myNavbar" style="padding-right: 2em;">
            <ul class="nav navbar-nav">
                <li><a href="index.php"><i class="glyphicon glyphicon-home"></i>Accueil</a></li>
                <li><a href="form.php"><i class="glyphicon glyphicon-hand-right"></i>  Sign up</a></li>
                <?php
                /*
                        echo "<li><a href='rechargement.php'><i class='glyphicon glyphicon-book'></i>Rechargement</a></li>";
                        echo "<li><a href='operateur.php'><i class='glyphicon glyphicon-book'></i>Operateur</a></li>";
                        echo "<li><a href='user.php'><i class='glyphicon glyphicon-user'></i>Ajouter</a></li>";
                        echo "<li><a href='type_operation.php'><i class='glyphicon glyphicon-user'></i>Type Operation</a></li>";
                  */  
                ?>
                <li><a href='deconexion.php'><i class='glyphicon glyphicon-off'></i>Deconexion</a></li>
                <!--li><a href="bilan.php"><i class="glyphicon glyphicon-book"></i>Bilan</a></li-->
            </ul>
        </div>
    </nav>
    
</div>
</div> 

    </body>
</html>
