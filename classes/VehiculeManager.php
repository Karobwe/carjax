<?php

class VehiculeManager {

  /**
  * @var PDO
  */
  private $pdo;

  function __construct(PDO $pdo) {
    $this->pdo = $pdo;
  }

  /**
  * @param int $id
  * @return array|bool Un tableau associatif représantant l'objet
  */
  public function getVehiculeById(int $id) {
    $stmt = $this->pdo->prepare("SELECT * FROM `carjax`.`vehicule`
      WHERE `id_vehicule` = :id;
    ");

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch();
    $stmt->closeCursor();
      
    return $result;
  }

  /**
  * @param Vehicule $vehicule L'objet à insérer dans la base de données
  * @return int L'id dans la base de données de la catégorie qui vient dêtre insérer
  */
  public function add(Vehicule $vehicule): int {
    $stmt = $this->pdo->prepare("INSERT INTO `carjax`.`vehicule` (`marque`, `modele`, `annee`, `couleur`) 
      VALUES (:marque, :modele, :annee, :couleur); 
    ");

    $stmt->bindValue(':marque', $vehicule->getMarque(), PDO::PARAM_STR);
    $stmt->bindValue(':modele', $vehicule->getModele(), PDO::PARAM_STR);
    $stmt->bindValue(':annee', $vehicule->getAnnee(), PDO::PARAM_STR);
    $stmt->bindValue(':couleur', $vehicule->getCouleur(), PDO::PARAM_STR);

    $stmt->execute();
    $stmt->closeCursor();

    return $this->pdo->lastInsertId();
  }

  /**
  * @param Vehicule $vehicule L'objet à modifier
  * @return int  Le nombre de lignes affecter par la méthode
  */
  public function update(Vehicule $vehicule) {
    $stmt = $this->pdo->prepare("UPDATE `carjax`.`vehicule` 
      SET `marque` = :marque, `modele` = :modele, `annee` = :annee, `couleur` = :couleur 
      WHERE (`id_vehicule` = '10');"
    );

    $stmt->bindValue(':marque', $vehicule->getMarque(), PDO::PARAM_INT);
    $stmt->bindValue(':modele', $vehicule->getModele(), PDO::PARAM_STR);
    $stmt->bindValue(':annee', $vehicule->getAnnee(), PDO::PARAM_STR);
    $stmt->bindValue(':couleur', $vehicule->getCouleur(), PDO::PARAM_STR);

    $stmt->execute();
    $stmt->closeCursor();
      
    return $stmt->rowCount();
  }

  /**
  * @param Vehicule $vehicule L'objet à supprimer
  * @return int  Le nombre de lignes affecter par la méthode
  */
  public function delete(Vehicule $vehicule) {
    $stmt = $this->pdo->prepare("DELETE FROM `carjax`.`vehicule` WHERE (`id_vehicule` = :id_vehicule);");

    $stmt->bindValue(':id_vehicule', $vehicule->getId(), PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();
      
    return $stmt->rowCount();
  }

  /**
  * @param int $id_vehicule id de l'objet à supprimer
  * @return int  Le nombre de lignes affecter par la méthode
  */
  public function deleteById(int $id_vehicule) {
    $stmt = $this->pdo->prepare("DELETE FROM `carjax`.`vehicule` WHERE (`id_vehicule` = :id_vehicule);");

    $stmt->bindValue(':id_vehicule', $id_vehicule, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();
      
    return $stmt->rowCount();
  }

  /**
  * @return array|bool Un tableau de tableaux associatifs représantant les objets
  */
  public function getAll() {
    $stmt = $this->pdo->prepare("SELECT * FROM `carjax`.`vehicule`;");
    $stmt->execute();
    $result = $stmt->fetchAll();
    $stmt->closeCursor();
      
    return $result;
  }
    
}
