<?php
//This page permits to add a new project

//Files used in this page
include '../lib/lib.php';
include "../lib/NavBar.php";
require '../vendor/autoload.php';

//Objets needed
use \App\Project;
use \App\Projects;

$pdo = Connect(); //Connection to the database
$projects = new Projects($pdo);

//Save all the datas in an array
$data=[
    'nom' => '',
    'version' => '',
    'date_de_debut' => '',
    'date_de_fin' => '',
    'id_equipes' => '',
    'id_avancements' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST['id_avancements'] = 1;
    $data = $_POST;

    $projects = new Projects(Connect());
    $project = new Project();
    $project = $projects->hydrateProject(new Project(), $data);
    $projects->createProject($project);
    header('Location: index.php?add=1');
    exit();
}


render('header', ['title' => 'Concept&Co | Ajout d\'un projet']); //Gives the header
?>
<!--Informations about the task-->
<div class="container" style="margin: 10% auto auto auto">
    <div class="card" style="background-color: rgba(0, 0, 20, 0.5)">
        <div class="card-header" style="color: white;">
            <h3>
                <?php if ($_SESSION['langues'] == 'Français'): ?>
                    Ajout d'un nouveau projet
                <?php endif; ?>
                <?php if ($_SESSION['langues'] == 'English'): ?>
                    Add a new project
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
                            <input type="text" name="nom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="version" style="color: white"><b>Version *</b></label>
                            <input type="number" name="version" class="form-control" required>
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
                            <label for="id_equipes" style="color: white"><b>Equipe en charge *</b></label>
                            <select class="form-control" required name="id_equipes">
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
                            <input type="text" name="nom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="version" style="color: white"><b>Version *</b></label>
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
