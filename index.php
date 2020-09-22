<?php
require_once 'db.php';

spl_autoload_register(function($classe){
  require_once 'classes/'.$classe.'.php';
});

$vehiculeManager = new VehiculeManager($pdo);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>Carjax</title>
  </head>
  <body>
    <div class="container pt-5">
        <div id="message"></div>

    <form method="post" id="form">
        <div class="form-group">
            <label for="marque">Marque</label>
            <input type="text" class="form-control" name="marque" id="marque">
        </div>
        
        <div class="form-group">
            <label for="modele">Modele</label>
            <input type="text" class="form-control" name="modele" id="modele">
        </div>

        <div class="form-group">
            <label for="annee">Annee</label>
            <input type="text" class="form-control" name="annee" id="annee">
        </div>

        <div class="form-group">
            <label for="couleur">Couleur</label>
            <input type="text" class="form-control" name="couleur" id="couleur">
        </div>

        <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Marque</th>
                <th scope="col">Modele</th>
                <th scope="col">Année</th>
                <th scope="col">Couleur</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($vehiculeManager->getAll() as $vehicule): ?>
                <tr>
                    <th scope="row"><?= $vehicule['id_vehicule'] ?></th>
                    <td><input type="text" value="<?= $vehicule['marque'] ?>" class="p-2 form-control" disabled></td>
                    <td><input type="text" value="<?= $vehicule['modele'] ?>" class="p-2 form-control" disabled></td>
                    <td><input type="text" value="<?= $vehicule['annee'] ?>" class="p-2 form-control" disabled></td>
                    <td><input type="text" value="<?= $vehicule['couleur'] ?>" class="p-2 form-control" disabled></td>
                    <td class="edit"><a href="" data-id="<?= $vehicule['id_vehicule'] ?>"><i class="fas fa-edit mr-3"></i></a></td>
                    <td class="remove"><a href="" data-id="<?= $vehicule['id_vehicule'] ?>"><i class="fas fa-trash-alt mr-3"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <!-- <script src="script1.js"></script> -->
  </body>
</html>
