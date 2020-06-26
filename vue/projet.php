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
    'id_equipes' => $project->getTeamProject(),
    'id_avancements' => $project->getStatusProject()
];


render('header', ['title' => 'Concept&Co | '.$data["nom"].'']); //Gives the header
?>
<!--Button which links to the page deleteProject.php-->
<button type="button" class="btn btn-dark" onclick="location.href='../controle/deleteProject.php?id_projet=<?= $_GET['id_projet'] ?>'" title="Cliquer pour supprimer le projet" style="float: right; margin-right: 30px">
    <?php if ($_SESSION['langues'] == 'Français'): ?>
        Supprimer le projet
    <?php endif; ?>
    <?php if ($_SESSION['langues'] == 'English'): ?>
        Delete the project
    <?php endif; ?>
</button>

<!--Button which links to the page addTask.php-->
<button type="button" class="btn btn-dark" onclick="location.href='addTask.php?id_projet=<?= $_GET['id_projet'] ?>'" title="Cliquer pour ajouter une tâche" style="float: right; margin-right: 30px">
    <?php if ($_SESSION['langues'] == 'Français'): ?>
        Ajout d'une tâche
    <?php endif; ?>
    <?php if ($_SESSION['langues'] == 'English'): ?>
        Add a task
    <?php endif; ?>
</button>

<!--Button which links to the page modifyProject.php-->
<button type="button" class="btn btn-dark" onclick="location.href='modifyProject.php?id_projet=<?= $_GET['id_projet'] ?>'" title="Cliquer pour ajouter une tâche" style="float: right; margin-right: 30px">
    <?php if ($_SESSION['langues'] == 'Français'): ?>
        Modifier le projet
    <?php endif; ?>
    <?php if ($_SESSION['langues'] == 'English'): ?>
        Modifiy the project
    <?php endif; ?>
</button>

<!--Button which opens the modal-->
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#statusModal" title="Cliquer pour changer l'avancement du projet" style="float: right; margin-right: 30px">
    <?php if ($_SESSION['langues'] == 'Français'): ?>
        Avancement
    <?php endif; ?>
    <?php if ($_SESSION['langues'] == 'English'): ?>
        Status
    <?php endif; ?>
</button>

<!--Display an alert if a task has been added-->
<?php if (isset($_GET['add'])): ?>
    <br><br><br>
    <div class="container">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php if ($_SESSION["langues"] == "Français"): ?>
                La tâche a été ajoutée
            <?php endif; ?>
            <?php if ($_SESSION["langues"] == "English"): ?>
                The task has been added
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>


<!--Display an alert if the projet has been modified-->
<?php if (isset($_GET['modify'])): ?>
    <br><br><br>
    <div class="container">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php if ($_SESSION["langues"] == "Français"): ?>
              Le projet a été modifié
            <?php endif; ?>
            <?php if ($_SESSION["langues"] == "English"): ?>
              The project has been modified
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>


<!--Informations about the task-->
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
            <li class="list-group-item">Etat du projet :
                <?php if ($data['id_avancements'] === 1) {
                    echo "En cours";
                } elseif ($data['id_avancements'] === 2) {
                    echo "Terminé";
                } else {
                    echo "En retard";
                }?></li>
            <li class="list-group-item">Equipe en charge du projet : équipe numéro <?= $data['id_equipes'] ?></li>
          <?php endif; ?>

          <?php if ($_SESSION['langues'] == 'English'): ?>
            <li class="list-group-item">Version: <?= $data['version'] ?></li>
            <li class="list-group-item">Start date: <?= $data['date_de_debut']->format('m/d/Y') ?></li>
            <li class="list-group-item">Deadline: <?= $data['date_de_fin']->format('m/d/Y') ?></li>
            <li class="list-group-item">Project's status:
                <?php if ($data['id_avancements'] === 1) {
                    echo "In progress";
                } elseif ($data['id_avancements'] === 2) {
                    echo "Finished";
                } else {
                    echo "Late";
                }?></li>
            <li class="list-group-item">Team in charge of the project: team number <?= $data['id_equipes'] ?></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</div>


<!--Code for the modal-->
<div class="modal fade" id="statusModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #f0f0f0">
                <h3 class="modal-title"><b>
                    <?php if ($_SESSION['langues'] == 'Français'): ?>
                        Changer l'avancement du projet
                    <?php endif; ?>
                    <?php if ($_SESSION['langues'] == 'English'): ?>
                        Change the project's status
                    <?php endif; ?>
                </b></h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="../controle/avancementProjetCtrl.php?id_projet=<?= $_GET['id_projet'] ?>" method="post">
                    <select name="avancement" class="form-control">
                        <?php if ($_SESSION['langues'] == 'Français'): ?>
                            <option value="en cours">En cours</option>
                            <option value="fini">Terminé</option>
                            <option value="retard">En retard</option>
                        <?php endif; ?>
                        <?php if ($_SESSION['langues'] == 'English'): ?>
                            <option value="en cours">In progress</option>
                            <option value="fini">Finished</option>
                            <option value="retard">Late</option>
                        <?php endif; ?>
                    </select>
                    <br>
                    <?php if ($_SESSION['langues'] == 'Français'): ?>
                        <button type="submit" class="btn btn-success"><b>VALIDER</b></button>
                    <?php endif; ?>
                    <?php if ($_SESSION['langues'] == 'English'): ?>
                        <button type="submit" class="btn btn-success"><b>SUBMIT</b></button>
                    <?php endif; ?>
                </form>
            </div>
            <div class="modal-footer" style="background-color: #f0f0f0">
                <?php if ($_SESSION['langues'] == 'Français'): ?>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><b>ANNULER</b></button>
                <?php endif; ?>
                <?php if ($_SESSION['langues'] == 'English'): ?>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><b>CANCEL</b></button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php render('footer') ?>
