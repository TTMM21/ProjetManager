<?php
//This page permits to modify a task

//Files used in this page
include '../lib/lib.php';
include "../lib/NavBar.php";
require '../vendor/autoload.php';
require '../controle/lists/getAccountsListCtrl.php';

//Objets needed
use \App\Task;
use \App\Tasks;

$pdo = Connect(); //Connection to the database
$tasks = new Tasks($pdo);

//Permits to know if there is a task with the given id
try {
    $task = $tasks->findTask($_GET['id_tache'] ?? null);
} catch (\Exception $e) {
    e404();
}

//Save all the datas in an array
$data=[
    'nom' => $task -> getNameTask(),
    'description' => $task -> getDescriptionTask(),
    'date_de_debut' => $task -> getStartTask(),
    'date_de_fin' => $task -> getEndTask(),
    'id_comptes' => $task -> getAccountTask()
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST['id_projets'] = $task -> getProjectTask();
    $_POST['id_avancements'] = $task -> getStatusTask();
    $data = $_POST;

    $tasks->hydrateTask($task, $data);
    dd($task);
    die();
    $tasks->updateTask($task);
    header("Location: tache.php?modify=1&id_tache=".$_GET['id_tache']);
    exit();
}


render('header', ['title' => 'Concept&Co | Modification d\'une tâche']); //Gives the header
?>
<!--Informations about the task-->
<div class="container" style="margin: 10% auto auto auto">
    <div class="card" style="background-color: rgba(0, 0, 20, 0.5)">
        <div class="card-header" style="color: white;">
            <h3>
                <?php if ($_SESSION['langues'] == 'Français'): ?>
                    Modifier la tâche
                <?php endif; ?>
                <?php if ($_SESSION['langues'] == 'English'): ?>
                    Modify the task
                <?php endif; ?>
            </h3>
        </div>
        <div class="card-body">
            <div style="margin: auto 10% auto 10%;">
                <!--Form to add a new task-->
                <form action="" method="post">
                    <?php if ($_SESSION['langues'] == 'Français'): ?>
                        <div class="form-group">
                            <label for="nom" style="color: white"><b>Nom de la tâche *</b></label>
                            <input type="text" name="nom" class="form-control" required value="<?= $data['nom'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="description" style="color: white"><b>Description *</b></label>
                            <input type="longtext" name="description" class="form-control" required value="<?= $data['description'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="date_de_debut" style="color: white"><b>Date de début *</b></label>
                            <input type="date" name="date_de_debut" class="form-control" required value="<?= $data['date_de_debut']->format('Y-m-d') ?>">
                        </div>
                        <div class="form-group">
                            <label for="date_de_fin" style="color: white"><b>Date de fin *</b></label>
                            <input type="date" name="date_de_fin" class="form-control" required value="<?= $data['date_de_fin']->format('Y-m-d') ?>">
                        </div>
                        <div class="form-group">
                            <label for="id_equipes" style="color: white"><b>Personne en charge *</b></label>
                            <?php getEmployeesListCtrl($data['id_comptes']) ?>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-success"><b>VALIDER</b></button>
                    <?php endif; ?>
                    <?php if ($_SESSION['langues'] == 'English'): ?>
                        <div class="form-group">
                            <label for="nom" style="color: white"><b>Task's name *</b></label>
                            <input type="text" name="nom" class="form-control" required value="<?= $data['nom'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="description" style="color: white"><b>Description *</b></label>
                            <input type="longtext" name="description" class="form-control" required value="<?= $data['description'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="date_de_debut" style="color: white"><b>Start date *</b></label>
                            <input type="date" name="date_de_debut" class="form-control" required value="<?= $data['date_de_debut']->format('Y-m-d') ?>">
                        </div>
                        <div class="form-group">
                            <label for="date_de_fin" style="color: white"><b>Deadline *</b></label>
                            <input type="date" name="date_de_fin" class="form-control" required value="<?= $data['date_de_fin']->format('Y-m-d') ?>">
                        </div>
                        <div class="form-group">
                            <label for="id_equipes" style="color: white"><b>Personne en charge *</b></label>
                            <?php getEmployeesListCtrl($data['id_comptes']) ?>
                        </div>
                        <button type="submit" class="btn btn-success"><b>SUBMIT</b></button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>

<br><br>

<?php render('footer') ?>
