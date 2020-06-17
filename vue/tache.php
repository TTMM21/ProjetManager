<?php
//This page shows all the information about a task

//Files used in the page
include '../lib/lib.php';
include "../lib/NavBar.php";
require '../vendor/autoload.php';
require '../lib/lists/getInfoTask.php';

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
    'id_comptes' => $task->getAccountTask(),
    'id_avancements' => $task->getStatusTask()
];


render('header', ['title' => 'Concept&Co | '.$data['nom'].'']); //Gives the header
?>
<!--Button which links to the page deleteTask.php-->
<a href="../controle/deleteTask.php?id_tache=<?= $_GET['id_tache'] ?>" class="btnLien"  style="float: right; margin-right: 30px">
    <?php if ($_SESSION['langues'] == 'Français'): ?>
        Supprimer la tâche
    <?php endif; ?>
    <?php if ($_SESSION['langues'] == 'English'): ?>
        Delete the task
    <?php endif; ?>
</a>

<!--Button which links to the page modifyTask.php-->
<a href="modifyTask.php?id_tache=<?= $_GET['id_tache'] ?>" class="btnLien"  style="float: right; margin-right: 30px">
    <?php if ($_SESSION['langues'] == 'Français'): ?>
        Modifier la tâche
    <?php endif; ?>
    <?php if ($_SESSION['langues'] == 'English'): ?>
        Modifiy the task
    <?php endif; ?>
</a>


<!--Button which opens the modal-->
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#statusModal" title="Cliquer pour changer l'avancement de la tâche" style="float: right; margin-right: 30px">
    <?php if ($_SESSION['langues'] == 'Français'): ?>
        Avancement
    <?php endif; ?>
    <?php if ($_SESSION['langues'] == 'English'): ?>
        Status
    <?php endif; ?>
</button>

<!--Display an alert if the task has been modified-->
<?php if (isset($_GET['modify'])): ?>
    <br><br><br>
    <div class="container">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php if ($_SESSION["langues"] == "Français"): ?>
              La tâche a été modifiée
            <?php endif; ?>
            <?php if ($_SESSION["langues"] == "English"): ?>
              The task has been modified
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
                <!--All the details about the task-->
                <ul class="list-group list-group-flash" style="border-radius: 10px">
                    <?php if ($_SESSION['langues'] == 'Français'): ?>
                        <li class="list-group-item">Description : <?= $data['description'] ?></li>
                        <li class="list-group-item">Date de début : <?= $data['date_de_debut']->format('d/m/Y') ?></li>
                        <li class="list-group-item">Date de fin : <?= $data['date_de_fin']->format('d/m/Y') ?></li>
                        <li class="list-group-item">Etat de la tâche :
                            <?php if ($data['id_avancements'] === 1) {
                                echo "En cours";
                            } elseif ($data['id_avancements'] === 2) {
                                echo "Terminée";
                            } else {
                                echo "En retard";
                            }?></li>
                            <li class="list-group-item">Tâche en lien avec le projet : <?= getProjectName($data['id_projets']) ?></li>
                            <li class="list-group-item">Personne en charge : <?= getUserName($data['id_comptes']) ?></li>
                        <?php endif; ?>

                        <?php if ($_SESSION['langues'] == 'English'): ?>
                            <li class="list-group-item">Description: <?= $data['description'] ?></li>
                            <li class="list-group-item">Start date: <?= $data['date_de_debut']->format('m/d/Y') ?></li>
                            <li class="list-group-item">Deadline: <?= $data['date_de_fin']->format('m/d/Y') ?></li>
                            <li class="list-group-item">Task's project: <?= $data['date_de_fin']->format('m/d/Y') ?></li>
                            <li class="list-group-item">Task in link with the project:
                                <?php if ($data['id_avancements'] === 1) {
                                    echo "In progress";
                                } elseif ($data['id_avancements'] === 2) {
                                    echo "Finished";
                                } else {
                                    echo "Late";
                                }?></li>
                                <li class="list-group-item">Person in charge: <?= getUserName($data['id_comptes']) ?></li>
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
                        Changer l'avancement de la tâche
                    <?php endif; ?>
                    <?php if ($_SESSION['langues'] == 'English'): ?>
                        Change the task's status
                    <?php endif; ?>
                </b></h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="../controle/avancementTacheCtrl.php?id_tache=<?= $_GET['id_tache'] ?>" method="post">
                    <select name="avancement" class="form-control">
                        <?php if ($_SESSION['langues'] == 'Français'): ?>
                            <option value="en cours">En cours</option>
                            <option value="fini">Terminée</option>
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
