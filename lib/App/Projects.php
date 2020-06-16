<?php

namespace App;

use DateTimeImmutable;
use Exception;
use PDO;

/**
 * Class Projects
 * Contains all the methods needed for the projects
 */
class Projects {

  /**
   * @var string;
   */
  private $pdo;


  /**
   * Projects constructor.
   * @param PDO $pdo
   */
  public function __construct(PDO $pdo) {
      $this->pdo = $pdo;
  }



  /**
  * Find a project
  * @param int $id_projets
  * @return Project
  * @throws Exception
  */
  public function findProject (int $id_projets): Project {
    require 'Project.php';
    $statement =  $this->pdo->query("SELECT * FROM projets WHERE id_projets = $id_projets LIMIT 1");
    $statement->setFetchMode(PDO::FETCH_CLASS, Project::class);
    $result=$statement->fetch();
    if ($result === false) {
        throw new Exception('Aucun résultat n\'a été trouvé');
    }
    return $result;
  }



  /**
  * Gives the values to nom, version, date_de_debut, date_de_fin, id_equipes, id_avancements
  * @param Project $project
  * @param array $data
  * @return Project
  */
  public function hydrateProject (Project $project, array $data) {
    $project->setNameProject("$data[nom]");
    $project->setVersionProject("$data[version]");
    $project->setStartProject(DateTimeImmutable::createFromFormat('Y-m-d', $data['date_de_debut'])->format('Y-m-d'));
    $project->setEndProject(DateTimeImmutable::createFromFormat('Y-m-d', $data['date_de_fin'])->format('Y-m-d'));
    $project->setTeamProject("$data[id_equipes]");
    $project->setStatusProject("$data[id_avancements]");

    return $project;
  }



  /**
  * Creates a new project in the database and uses the hydrate's data
  * @param Project $project
  * @return bool
  * @throws Exception
  */
  public function createProject (Project $project): bool {
    $statement = $this->pdo->prepare('INSERT INTO projets (nom, version, date_de_debut, date_de_fin, id_equipes, id_avancements) VALUES (?, ?, ?, ?, ?, ?)');
    return $statement->execute([
      $project->getNameProject(),
      $project->getVersionProject(),
      $project->getStartProject()->format('Y-m-d'),
      $project->getEndProject()->format('Y-m-d'),
      $project->getTeamProject(),
      $project->getStatusProject()
    ]);
  }



  /**
  * Updates a project in the database
  * @param Project $project
  * @return bool
  * @throws Exception
  */
  public function updateProject (Project $project): bool {
    $statement = $this->pdo->prepare('UPDATE projets SET nom=?, version=?, date_de_debut=?, date_de_fin=?, id_equipes=?, id_avancements=? WHERE id_projets=?');
    return $statement->execute([
      $project->getNameProject(),
      $project->getVersionProject(),
      $project->getStartProject()->format('Y-m-d'),
      $project->getEndProject()->format('Y-m-d'),
      $project->getTeamProject(),
      $project->getStatusProject(),
      $project->getIdProject()
      ]);
  }
}
?>
