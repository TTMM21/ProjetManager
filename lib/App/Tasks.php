<?php

namespace App;

use DateTimeImmutable;
use Exception;
use PDO;

/**
 * Class Tasks
 * Contains all the methods needed for the tasks
 */
class Tasks {

  /**
   * @var string;
   */
  private $pdo;


  /**
   * Tasks constructor.
   * @param PDO $pdo
   */
  public function __construct(PDO $pdo) {
      $this->pdo = $pdo;
  }



  /**
  * Find a task
  * @param int $id_taches
  * @return Task
  * @throws Exception
  */
  public function findTask (int $id_taches): Task {
    require 'Task.php';
    $statement =  $this->pdo->query("SELECT * FROM taches WHERE id_taches = $id_taches LIMIT 1");
    $statement->setFetchMode(PDO::FETCH_CLASS, Task::class);
    $result=$statement->fetch();
    if ($result === false) {
        throw new Exception('Aucun résultat n\'a été trouvé');
    }
    return $result;
  }



  /**
  * Gives the values to nom, description, date_de_debut, date_de_fin, id_projets, id_comptes
  * @param Task $task
  * @param array $data
  * @return Task
  */
  public function hydrateTask (Task $task, array $data) {
    $task->setNameTask("$data[nom]");
    $task->setDescriptionTask("$data[description]");
    $task->setStartTask(DateTimeImmutable::createFromFormat('Y-m-d', "$data[date_de_debut])->format('Y-m-d"));
    $task->setEndTask(DateTimeImmutable::createFromFormat('Y-m-d', "$data[date_de_fin])->format('Y-m-d"));
    $task->setProjectTask("$data[id_projets]");
    $task->setAccountTask("$data[id_compte]");
    return $task;
  }



  /**
  * Creates a new task in the database and uses the hydrate's data
  * @param Task $task
  * @return bool
  * @throws Exception
  */
  public function createTask (Task $task): bool {
    $statement = $this->pdo->prepare('INSERT INTO taches (nom, description, date_de_debut, date_de_fin, id_projets, id_comptes) VALUES (?, ?, ?, ?, ?, ?)');
    return $statement->execute([
      $task->getNameTask(),
      $task->getDescriptionTask(),
      $task->getStartTask()->format('Y-m-d'),
      $task->getEndTask()->format('Y-m-d'),
      $task->getProjectTask(),
      $task->getAccountTask()
    ]);
  }



  /**
  * Updates a task in the database
  * @param Task $task
  * @return bool
  * @throws Exception
  */
  public function updateTask (Task $task): bool {
    $statement = $this->pdo->prepare('UPDATE taches SET nom=?, description=?, date_de_debut=?, date_de_fin=?, id_projets=?, id_comptes=? WHERE id_taches=?');
    return $statement->execute([
      $task->getNameTask(),
      $task->getDescriptionTask(),
      $task->getStartTask()->format('Y-m-d'),
      $task->getEndTask()->format('Y-m-d'),
      $task->getProjectTask(),
      $task->getAccountTask(),
      $task->getIdTask()
      ]);
  }
}
?>
