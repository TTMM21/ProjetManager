<?php
//This page shows all the information about a project

//Files used in this page
include '../lib/lib.php';
include "../lib/NavBar.php";
require '../vendor/autoload.php';

//Objets needed
use \App\Project;
use \App\Projects;

$pdo = Connect(); //Connection to the database
$projects = new Projects($pdo);

//Checks if there is a project with this id
try {
    $project = $projects->findProject($_GET['id_projet']);
} catch (Exception $e) {
    e404();
}

//Save all the datas in an array
$data=[
    'nom' => $project->getNameProject(),
    'version' => $project->getVersionProject(),
    'date_de_debut' => $project->getStartProject(),
    'date_de_fin' => $project->getEndProject(),
    'id_equipe' => $project->getTeamProject()
];

render('header', ['title' => 'Concept&Co | '.$data["nom"].'']); //Gives the header
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
        <!--All the details about the project-->
        <ul class="list-group list-group-flash" style="border-radius: 10px">
          <?php if ($_SESSION['langues'] == 'Français'): ?>
            <li class="list-group-item">Version : <?= $data['version'] ?></li>
            <li class="list-group-item">Date de début : <?= $data['date_de_debut']->format('d/m/Y') ?></li>
            <li class="list-group-item">Date de fin : <?= $data['date_de_fin']->format('d/m/Y') ?></li>
            <li class="list-group-item">Equipe en charge du projet : équipe numéro <?= $data['id_equipe'] ?></li>
          <?php endif; ?>

          <?php if ($_SESSION['langues'] == 'English'): ?>
            <li class="list-group-item">Version: <?= $data['version'] ?></li>
            <li class="list-group-item">Start date: <?= $data['date_de_debut']->format('m/d/Y') ?></li>
            <li class="list-group-item">Deadline: <?= $data['date_de_fin']->format('m/d/Y') ?></li>
            <li class="list-group-item">Team in charge of the project: team number <?= $data['id_equipe'] ?></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</div>




<?php render('footer') ?>
