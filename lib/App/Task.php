<?php

namespace App;

use DateTime;
use Exception;

/**
 * Class Task
 * All the getters and setters useful for the tasks
 */
class Task {

  /**
   * @var int
   */
  public $id_taches;

  /**
   * @var string
   */
  public $nom;

  /**
   * @var string
   */
  public $description;

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
  public $id_projets;

  /**
   * @var int
   */
  public $id_comptes;

  /**
   * @var int
   */
  public $id_avancements;



  /**
  * Obtain the task's id
  * @return int
  */
  public function getIdTask() : int {
    return $this->id_taches;
  }

  /**
  * Obtain the task's name
  * @return string
  */
  public function getNameTask() : string {
    return $this->nom;
  }

  /**
  * Obtain the task's description
  * @return string
  */
  public function getDescriptionTask() : string {
    return $this->description;
  }

  /**
  * Obtain the task's begginning date
  * @return DateTime
  * @throws Exception
  */
  public function getStartTask() : DateTime {
    return new Datetime($this->date_de_debut);
  }

  /**
  * Obtain the task's ending date
  * @return DateTime
  * @throws Exception
  */
  public function getEndTask() : DateTime {
    return new Datetime($this->date_de_fin);
  }

  /**
  * Obtain the task's project
  * @return int
  */
  public function getProjectTask() : int {
    return $this->id_projets;
  }

  /**
  * Obtain the user in charges of the task
  * @return int
  */
  public function getAccountTask() : int {
    return $this->id_comptes;
  }

  /**
  * Obtain the task's status
  * @return int
  */
  public function getStatusTask() : int {
    return $this->id_comptes;
  }



  /**
  * Define the task's name
  * @param string $nom
  */
  public function setNameTask (string $nom) {
    $this->nom = $nom;
  }

  /**
  * Define the task's description
  * @param string $description
  */
  public function setDescriptionTask (string $description) {
    $this->description = $description;
  }

  /**
  * Define the task's starting date
  * @param string $date_de_debut
  */
  public function setStartTask (string $date_de_debut) {
    $this->date_de_debut = $date_de_debut;
  }

  /**
  * Define the task's ending date
  * @param string $date_de_fin
  */
  public function setEndTask (string $date_de_fin) {
    $this->date_de_fin = $date_de_fin;
  }

  /**
  * Define the task's project
  * @param int $id_projets
  */
  public function setProjectTask (int $id_projets) {
    $this->id_projets = $id_projets;
  }

  /**
  * Define the user in charges of the task
  * @param int $id_comptes
  */
  public function setAccountTask (int $id_comptes) {
    $this->id_comptes = $id_comptes;
  }

  /**
  * Define the task's status
  * @param int $id_avancements
  */
  public function setStatusTask (int $id_avancements) {
    $this->id_avancements = $id_avancements;
  }
}
?>
