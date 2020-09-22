<?php 

require_once 'db.php';

spl_autoload_register(function($classe){
  require_once 'classes/'.$classe.'.php';
});

$manager = new VehiculeManager($pdo);

if(isset($_GET['marque'], $_GET['modele'], $_GET['annee'], $_GET['couleur'])) {
  if(!empty($_GET['marque']) && !empty($_GET['modele']) && !empty($_GET['annee']) && !empty($_GET['couleur'])) {
    try {
      $v = new Vehicule($_GET['marque'], $_GET['modele'], $_GET['annee'], $_GET['couleur']);
      $last_id = $manager->add($v);
      $datas = $manager->getVehiculeById($last_id);
      echo json_encode($datas);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
} else if(isset($_GET['delete'])) {
  $id = $_GET['delete'];
  if($manager->deleteById($id)) {
    header('HTTP/1.0 200 Véhicule supprimé');
    echo 'Le véhicule a bien été supprimer';
  }
}
