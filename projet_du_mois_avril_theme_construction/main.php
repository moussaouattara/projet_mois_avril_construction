<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mon Projet du Mois d'Avril Theme : Construction</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" type="image/png" href="img/logo.png">
        <link href="b.css" rel="stylesheet">
    </head>
    <body style="background-image: url('https://mdbootstrap.com/img/Photos/Others/architecture.jpg');background-attachment: fixed;background-repeat:  no-repeat;background-size:  cover;font-family: Roboto, serif;">
        <div>
        <?php include('menu.php'); ?>
        </div>

        <div class="container admin">
            <div class="row" style="padding-top: 5em;">
                <h1><strong>Liste des terrains disponible   </strong></h1>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom du proprietaire</th>
                      <th>Description du terrain</th>
                      <th>Prix du terrain</th>
                      <th>Ville</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        require 'database.php';
                        $db = Database::connect();
                        $statement = $db->query('SELECT items.id, items.name, items.description, items.price, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id ORDER BY items.id DESC');
                        while($item = $statement->fetch()) 
                        {
                            echo '<tr>';
                            echo '<td>'. $item['name'] . '</td>';
                            echo '<td>'. $item['description'] . '</td>';
                            echo '<td>'. number_format($item['price'], 2, '.', '') . '</td>';
                            echo '<td>'. $item['category'] . '</td>';
                            echo '<td width=150 style="text-align: center;">';
                            echo '<a class="btn btn-default" href="admin/view.php?id='.$item['id'].'"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>';
                            echo ' ';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                      ?>
                  </tbody>
                </table>
            </div>
        </div>

    </body>
</html>