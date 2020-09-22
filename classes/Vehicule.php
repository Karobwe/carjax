<?php

class Vehicule {
  
  /**
   * @var int
   */
  private $id;

  /**
   * @var string
   */
  private $marque;

  /**
   * @var string
   */
  private $modele;

  /**
   * @var string
   */
  private $annee;
  
  /**
   * @var string
   */
  private $couleur;

  public function __construct(string $marque, string $modele, string $annee, string $couleur) {
    $this->setMarque($marque);
    $this->setModele($modele);
    $this->setAnnee($annee);
    $this->setCouleur($couleur);
  }

  public function getId(): int {
    return $this->id;
  }

  public function setId(int $id): void {
    $this->id = $id;
  }

  public function getMarque(): string {
    return $this->marque;
  }

  public function setMarque(string $marque): void {
    $this->marque = $marque;
  }

  public function getModele(): string {
    return $this->modele;
  }

  public function setModele(string $modele): void {
    $this->modele = $modele;
  }

  public function getAnnee(): string {
    return $this->annee;
  }

  public function setAnnee(string $annee): void {
    $this->annee = $annee;
  }

  public function getCouleur(): string {
    return $this->couleur;
  }

  public function setCouleur(string $couleur): void {
    $this->couleur = $couleur;
  }

}
