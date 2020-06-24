<?php

namespace App;

use PDO;

/**
 * Class Users
 * Contains all the methods needed for the users
 */
class Users {

  /**
   * @var string;
   */
  private $pdo;


  /**
   * Users constructor.
   * @param PDO $pdo
   */
  public function __construct(PDO $pdo) {
      $this->pdo = $pdo;
  }



  /**
  * Find a user
  * @param int $id_compte
  * @return User
  * @throws Exception
  */
  public function findUser (int $id_compte): User {
    require 'User.php';
    $statement =  $this->pdo->query("SELECT * FROM comptes WHERE id_compte = $id_compte LIMIT 1");
    $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
    $result=$statement->fetch();
    if ($result === false) {
        throw new Exception('Aucun résultat n\'a été trouvé');
    }
    return $result;
  }



  /**
  * Gives the values to nom, prenom, email, mdp, actif, malvoyant, $id_statuts, $id_equipes, $id_langues
  * @param User $user
  * @param array $data
  * @return User
  */
  public function hydrateUser (User $user, array $data) {
    $user->setLastNameUser("$data[nom]");
    $user->setFirstNameUser("$data[prenom]");
    $user->setEmailUser("$data[email]");
    $user->setPasswordUser("$data[mdp]");
    $user->setActivateUser("$data[actif]");
    $user->setVisionUser("$data[malvoyant]");
    $user->setStatusUser("$data[id_statuts]");
    $user->setTeamUser("$data[id_equipes]");
    $user->setLanguageUser("$data[id_langues]");
    return $user;
  }



  /**
  * Creates a new user in the database and uses the hydrate's data
  * @param User $user
  * @return bool
  * @throws Exception
  */
  public function createUser (User $user): bool {
    $statement = $this->pdo->prepare('INSERT INTO comptes (nom, prenom, email, mdp, actif, malvoyant, id_statuts, id_equipes, id_langues) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
    return $statement->execute([
      $user->getLastNameUser(),
      $user->getFirstNameUser(),
      $user->getEmailUser(),
      $user->getPasswordUser(),
      $user->getActivateUser(),
      $user->getVisionUser(),
      $user->getStatusUser(),
      $user->getTeamUser(),
      $user->getLanguageUser()
    ]);
  }



  /**
  * Updates a user in the database
  * @param User $user
  * @return bool
  * @throws Exception
  */
  public function updateUser (User $user): bool {
    $statement = $this->pdo->prepare('UPDATE comptes SET nom=?, prenom=?, email=?, mdp=?, actif=?, malvoyant=?, id_statuts=?, id_equipes=?, id_langues=? WHERE id_comptes=?');
    return $statement->execute([
      $user->getLastNameUser(),
      $user->getFirstNameUser(),
      $user->getEmailUser(),
      $user->getPasswordUser(),
      $user->getActivateUser(),
      $user->getVisionUser(),
      $user->getStatusUser(),
      $user->getTeamUser(),
      $user->getLanguageUser(),
      $user->getIdUser()
      ]);
  }
}
?>
