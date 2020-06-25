<?php
//This page permits to add a new task

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

//Save all the datas in an array
$data=[
    'nom' => '',
    'description' => '',
    'date_de_debut' => '',
    'date_de_fin' => '',
    'id_projets' => '',
    'id_comptes' => '',
    'id_avancements' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST['id_projets'] = $_GET['id_projet'];
    $_POST['id_avancements'] = 1;
    $data = $_POST;

    $tasks = new Tasks(Connect());
    $task = new Task();
    $task = $tasks->hydrateTask(new Task(), $data);
    $tasks->createTask($task);
    header("Location: projet.php?id_projet=".$_GET['id_projet']."&add=1");
    exit();
}


render('header', ['title' => 'Concept&Co | Ajout d\'une tâche']); //Gives the header
?>
<!--Informations about the task-->
<div class="container" style="margin: 10% auto auto auto">
    <div class="card" style="background-color: rgba(0, 0, 20, 0.5)">
        <div class="card-header" style="color: white;">
            <h3>
                <?php if ($_SESSION['langues'] == 'Français'): ?>
                    Ajout d'une nouvelle tâche
                <?php endif; ?>
                <?php if ($_SESSION['langues'] == 'English'): ?>
                    Add a new task
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
                            <input type="text" name="nom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="version" style="color: white"><b>Description *</b></label>
                            <input type="longtext" name="version" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="date_de_debut" style="color: white"><b>Date de début *</b></label>
                            <input type="date" name="date_de_debut" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="date_de_fin" style="color: white"><b>Date de fin *</b></label>
                            <input type="date" name="date_de_fin" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="id_equipes" style="color: white"><b>Personne en charge *</b></label>
                            <?php getEmployeesListCtrl() ?>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-success"><b>VALIDER</b></button>
                    <?php endif; ?>
                    <?php if ($_SESSION['langues'] == 'English'): ?>
                        <div class="form-group">
                            <label for="nom" style="color: white"><b>Task's name *</b></label>
                            <input type="text" name="nom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="version" style="color: white"><b>Description *</b></label>
                            <input type="text" name="version" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="date_de_debut" style="color: white"><b>Start date *</b></label>
                            <input type="date" name="date_de_debut" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="date_de_fin" style="color: white"><b>Deadline *</b></label>
                            <input type="date" name="date_de_fin" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="id_equipes" style="color: white"><b>Team in charges *</b></label>
                            <select class="form-control" required name="id_equipes">
                                <option value="1">Equipe 1</option>
                                <option value="2">Equipe 2</option>
                                <option value="3">Equipe 3</option>
                                <option value="4">Equipe 4</option>
                            </select>
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
