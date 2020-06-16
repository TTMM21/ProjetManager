<?php
//This page permits to modify a project

//Files used in this page
include '../lib/lib.php';
include "../lib/NavBar.php";
require '../vendor/autoload.php';

//Objets needed
use \App\Project;
use \App\Projects;

$pdo = Connect(); //Connection to the database
$projects = new Projects($pdo);

//Permits to know if there is a project with the given id
try {
    $project = $projects->findProject($_GET['id_projet'] ?? null);
} catch (\Exception $e) {
    e404();
}

//Save all the datas in an array
$data=[
    'nom' => $project->getNameProject(),
    'version' => $project->getVersionProject(),
    'date_de_debut' => $project->getStartProject(),
    'date_de_fin' => $project->getEndProject(),
    'id_equipes' => $project->getTeamProject()
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST['id_avancements'] = $project->getStatusProject();
    $data = $_POST;

    $projects->hydrateProject($project, $data);
    $projects->updateProject($project);
    header("Location: projet.php?modify=1&id_projet=".$_GET['id_projet']);
    exit();
}


render('header', ['title' => 'Concept&Co | Modiication d\'un projet']); //Gives the header
?>
<!--Informations about the task-->
<div class="container" style="margin: 10% auto auto auto">
    <div class="card" style="background-color: rgba(0, 0, 20, 0.5)">
        <div class="card-header" style="color: white;">
            <h3>
                <?php if ($_SESSION['langues'] == 'Français'): ?>
                    Modifier le projet
                <?php endif; ?>
                <?php if ($_SESSION['langues'] == 'English'): ?>
                    Modify the project
                <?php endif; ?>
            </h3>
        </div>
        <div class="card-body">
            <div style="margin: auto 10% auto 10%;">
                <!--Form to add a new project-->
                <form action="" method="post">
                    <?php if ($_SESSION['langues'] == 'Français'): ?>
                        <div class="form-group">
                            <label for="nom" style="color: white"><b>Nom du projet *</b></label>
                            <input type="text" name="nom" class="form-control" required value="<?= $data['nom'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="version" style="color: white"><b>Version *</b></label>
                            <input type="text" name="version" class="form-control" required value="<?= $data['version'] ?>">
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
                            <label for="id_equipes" style="color: white"><b>Equipe en charge *</b></label>
                            <select class="form-control" required value="" name="id_equipes">
                                <option value="1">Equipe 1</option>
                                <option value="2">Equipe 2</option>
                                <option value="3">Equipe 3</option>
                                <option value="4">Equipe 4</option>
                            </select>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-success"><b>VALIDER</b></button>
                    <?php endif; ?>
                    <?php if ($_SESSION['langues'] == 'English'): ?>
                        <div class="form-group">
                            <label for="nom" style="color: white"><b>Project's name *</b></label>
                            <input type="text" name="nom" class="form-control" required value="<?= $data['nom'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="version" style="color: white"><b>Version *</b></label>
                            <input type="text" name="version" class="form-control" required value="<?= $data['version'] ?>">
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
                            <label for="id_equipes" style="color: white"><b>Team in charges *</b></label>
                            <select class="form-control" required value="" name="id_equipes">
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
