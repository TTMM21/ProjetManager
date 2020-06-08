<?php
//This page shows all the information about a task

//Files used in the page
include '../lib/lib.php';
include "../lib/NavBar.php";
require '../vendor/autoload.php';

//Objets needed
use \App\Task;
use \App\Tasks;

$pdo = Connect(); //Connection to the database
$tasks = new Tasks($pdo);

//Checks if there is a task with this id
try {
    $task = $tasks->findTask($_GET['id_tache']);
} catch (Exception $e) {
    e404();
}

//Save all the datas in an array
$data=[
    'nom' => $task->getNameTask(),
    'description' => $task->getDescriptionTask(),
    'date_de_debut' => $task->getStartTask(),
    'date_de_fin' => $task->getEndTask(),
    'id_projets' => $task->getProjectTask(),
    'id_compte' => $task->getAccountTask()
];

function getProjectName($id) {
  $req = "SELECT nom FROM projets WHERE id_projets = $id";
  $connection = Connect();
  $result = execQuery($connection, $req)->fetch();
  return $result['0'];
}

function getUserName($id) {
  $req = "SELECT prenom FROM comptes WHERE id_compte = $id";
  $connection = Connect();
  $result = execQuery($connection, $req)->fetch();
  return $result['0'];
}


render('header', ['title' => 'Concept&Co | '.$data['nom'].'']); //Gives the header
?>
<div class="container" style="margin: 10% auto auto auto">
  <div class="card" style="background-color: rgba(0, 0, 20, 0.5)">
    <div class="card-header" style="color: white;">
      <h3>
        <?= $data['nom'] ?>
      </h3>
    </div>
    <div class="card-body">
      <div style="margin: auto 10% auto 10%;">
        <!--All the details about the task-->
        <ul class="list-group list-group-flash" style="border-radius: 10px">
          <?php if ($_SESSION['langues'] == 'Français'): ?>
            <li class="list-group-item">Description : <?= $data['description'] ?></li>
            <li class="list-group-item">Date de début : <?= $data['date_de_debut']->format('d/m/Y') ?></li>
            <li class="list-group-item">Date de fin : <?= $data['date_de_fin']->format('d/m/Y') ?></li>
            <li class="list-group-item">Tâche en lien avec le projet : <?= getProjectName($data['id_projets']) ?></li>
            <li class="list-group-item">Personne en charge : <?= getUserName($data['id_compte']) ?></li>
          <?php endif; ?>

          <?php if ($_SESSION['langues'] == 'English'): ?>
            <li class="list-group-item">Description: <?= $data['description'] ?></li>
            <li class="list-group-item">Start date: <?= $data['date_de_debut']->format('m/d/Y') ?></li>
            <li class="list-group-item">Deadline: <?= $data['date_de_fin']->format('m/d/Y') ?></li>
            <li class="list-group-item">Task in link with the project: <?= getProjectName($data['id_projets']) ?></li>
            <li class="list-group-item">Person in charge: <?= getUserName($data['id_compte']) ?></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</div>




<?php render('footer') ?>
