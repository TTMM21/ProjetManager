<?php

namespace App;

use DateTime;
use Exception;

/**
 * Class Project
 * All the getters and setters useful for the projects
 */
class Project {

  /**
   * @var int
   */
  public $id_projets;

  /**
   * @var string
   */
  public $nom;

  /**
   * @var int
   */
  public $version;

  /**
   * @var DateTime
   */
  public $date_de_debut;

  /**
   * @var DateTime
   */
  public $date_de_fin;

  /**
   * @var int
   */
  public $id_equipes;

  /**
   * @var int
   */
  public $id_avancements;



  /**
  * Obtain the project's id
  * @return int
  */
  public function getIdProject() : int {
    return $this->id_projets;
  }

  /**
  * Obtain the project's name
  * @return string
  */
  public function getNameProject() : string {
    return $this->nom;
  }

  /**
  * Obtain the project's version
  * @return int
  */
  public function getVersionProject() : int {
    return $this->version;
  }

  /**
  * Obtain the project's begginning date
  * @return DateTime
  * @throws Exception
  */
  public function getStartProject() : DateTime {
    return new Datetime($this->date_de_debut);
  }

  /**
  * Obtain the project's ending date
  * @return DateTime
  * @throws Exception
  */
  public function getEndProject() : DateTime {
    return new Datetime($this->date_de_fin);
  }

  /**
  * Obtain the team in charges of the project
  * @return int
  */
  public function getTeamProject() : int {
    return $this->id_equipes;
  }

  /**
  * Obtain the project's status
  * @return int
  */
  public function getStatusProject() : int {
    return $this->id_avancements;
  }



  /**
  * Define the project's name
  * @param string $nom
  */
  public function setNameProject (string $nom) {
    $this->nom = $nom;
  }

  /**
  * Define the project's version
  * @param int $version
  */
  public function setVersionProject (int $version) {
    $this->version = $version;
  }

  /**
  * Define the project's starting date
  * @param string $date_de_debut
  */
  public function setStartProject (string $date_de_debut) {
    $this->date_de_debut = $date_de_debut;
  }

  /**
  * Define the project's ending date
  * @param string $date_de_fin
  */
  public function setEndProject (string $date_de_fin) {
    $this->date_de_fin = $date_de_fin;
  }

  /**
  * Define the team in charges of the project
  * @param int $id_equipes
  */
  public function setTeamProject (int $id_equipes) {
    $this->id_equipes = $id_equipes;
  }

  /**
  * Define the project's status
  * @param int $id_avancements
  */
  public function setStatusProject (int $id_avancements) {
    $this->id_avancements = $id_avancements;
  }
}
?>
