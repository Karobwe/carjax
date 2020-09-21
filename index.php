<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Carjax</title>
  </head>
  <body>
    <div class="container">
        <div id="result" class="container p-3 bg-dark text-white"></div>

    <form method="post" id="form" class="py-5">
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

        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Marque</th>
            <th scope="col">Modele</th>
            <th scope="col">Année</th>
            <th scope="col">Couleur</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>
