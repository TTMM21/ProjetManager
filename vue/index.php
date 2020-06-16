<?php
include '../lib/lib.php';
include '../controle/lists/getProjectsListCtrl.php';
include '../controle/lists/getTasksListCtrl.php';
include "../lib/NavBar.php";


if ($_SESSION['langues'] == "Français") {
  render('header', ['title' => 'Concept&Co | Accueil']);
} else {
  render('header', ['title' => 'Concept&Co | Homepage']);
}
?>
<!--Display an alert if a projet has been added-->
<?php if (isset($_GET['add'])): ?>
    <div class="container">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php if ($_SESSION["langues"] == "Français"): ?>
              Le projet a été ajouté
            <?php endif; ?>
            <?php if ($_SESSION["langues"] == "English"): ?>
              The project has been added
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<div class="row" style="margin: 1% auto auto auto">
  <div class="col">
    <div class="card" style="background-color: rgba(0, 0, 20, 0.5)">
      <div class="card-header" style="color: white">
        <h3>
          <b>
            <?php if ($_SESSION["langues"] == "Français"): ?>
              Mes projets en cours
            <?php endif; ?>
            <?php if ($_SESSION["langues"] == "English"): ?>
              My current projects
            <?php endif; ?>
          </b>
        </h3>
      </div>
      <div class="card-body">
        <div style="margin: auto 10% auto 10%">
          <?php getProjectsListCtrl($_SESSION['equipe']) ?>
        </div>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card" style="background-color: rgba(0, 0, 20, 0.5)">
      <div class="card-header" style="color: white">
        <h3>
          <b>
            <?php if ($_SESSION["langues"] == "Français"): ?>
              Mes tâches en cours
            <?php endif; ?>
            <?php if ($_SESSION["langues"] == "English"): ?>
              My current tasks
            <?php endif; ?>
          </b>
        </h3>
      </div>
      <div class="card-body">
        <div style="margin: auto 10% auto 10%">
          <?php getTasksListCtrl($_SESSION['id']) ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php render('footer') ?>
