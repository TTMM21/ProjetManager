<?php

namespace App;


/**
 * Class User
 * All the getters and setters useful for the users
 */
class User {

  /**
   * @var int
   */
  public $id_compte;

  /**
   * @var string
   */
  public $nom;

  /**
   * @var string
   */
  public $prenom;

  /**
   * @var string
   */
  public $email;

  /**
   * @var bool
   */
  public $actif;

  /**
   * @var bool
   */
  public $malvoyant;

  /**
   * @var int
   */
  public $id_statuts;

  /**
   * @var int
   */
  public $id_equipes;

  /**
   * @var int
   */
  public $id_langues;



  /**
  * Obtain the user's id
  * @return int
  */
  public function getIdUser() : int {
    return $this->id_compte;
  }

  /**
  * Obtain the user's last name
  * @return string
  */
  public function getLastNameUser() : string {
    return $this->nom;
  }

  /**
  * Obtain the user's first name
  * @return string
  */
  public function getFirstNameUser() : string {
    return $this->prenom;
  }

  /**
  * Obtain the user's email
  * @return string
  */
  public function getEmailUser() : string {
    return $this->email;
  }

  /**
  * Obtain the boolean used to know if the user's account is activated or not
  * @return bool
  */
  public function getActivateUser() : bool {
    return $this->actif;
  }

  /**
  * Obtain the boolean used to know if the user is a visually impaired person or not
  * @return bool
  */
  public function getVisionUser() : bool {
    return $this->malvoyant;
  }

  /**
  * Obtain the user's status
  * @return int
  */
  public function getStatusUser() : int {
    return $this->id_statuts;
  }

  /**
  * Obtain the user's team
  * @return int
  */
  public function getTeamUser() : int {
    return $this->id_equipes;
  }

  /**
  * Obtain the user's language
  * @return int
  */
  public function getLanguageUser() : int {
    return $this->id_langues;
  }



  /**
  * Define the user's last name
  * @param string $nom
  */
  public function setLastNameUser (string $nom) {
    $this->nom = $nom;
  }

  /**
  * Define the user's first name
  * @param string $prenom
  */
  public function setFirstNameUser (string $prenom) {
    $this->prenom = $prenom;
  }

  /**
  * Define the user's email
  * @param string $email
  */
  public function setEmailUser (string $email) {
    $this->email = $email;
  }

  /**
  * Define if the user's accounts is activated or not
  * @param bool $actif
  */
  public function setActivateUser (bool $actif) {
    $this->actif = $actif;
  }

  /**
  * Define if the user is a visually impaired person or not
  * @param bool $malvoyant
  */
  public function setVisionUser (bool $malvoyant) {
    $this->malvoyant = $malvoyant;
  }

  /**
  * Define if the user's status
  * @param bool $statuts
  */
  public function setStatusUser (bool $statuts) {
    $this->statuts = $statuts;
  }

  /**
  * Define if the user's team
  * @param bool $equipes
  */
  public function setTeamUser (bool $equipes) {
    $this->equipes = $equipes;
  }

  /**
  * Define if the user's language
  * @param bool $langues
  */
  public function setLanguageUser (bool $langues) {
    $this->langues = $langues;
  }
}
?>
