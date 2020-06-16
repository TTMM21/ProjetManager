<?php
include '../lib/lib.php';
include '../controle/lists/getTasksListCtrl.php';
include "../lib/NavBar.php";


if ($_SESSION['langues'] == "Français") {
  render('header', ['title' => 'Concept&Co | Accueil']);
} else {
  render('header', ['title' => 'Concept&Co | Homepage']);
}
?>
<div class="container" style="margin: 10% auto auto auto">
  <div class="card" style="background-color: rgba(0, 0, 20, 0.5)">
    <div class="card-header" style="color: white">
      <h3>
        <b>
          <?php if ($_SESSION["langues"] == "Français"): ?>
            Mes tâches terminées
          <?php endif; ?>
          <?php if ($_SESSION["langues"] == "English"): ?>
            My finished tasks
          <?php endif; ?>
        </b>
      </h3>
    </div>
    <div class="card-body">
      <div style="margin: auto 10% auto 10%">
        <?php getTasksFinishedListCtrl($_SESSION['id']) ?>
      </div>
    </div>
  </div>
</div>


<?php render('footer') ?>
