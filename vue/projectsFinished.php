<?php
include '../lib/lib.php';
include '../controle/lists/getProjectsListCtrl.php';
include "../lib/NavBar.php";


if ($_SESSION['langues'] == "Français") {
  render('header', ['title' => 'Concept&Co | Accueil']);
} else {
  render('header', ['title' => 'Concept&Co | Homepage']);
}
?>
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
      <?php getProjectsListCtrl($_SESSION['id']) ?>
    </div>
  </div>
</div>

<?php render('footer') ?>
