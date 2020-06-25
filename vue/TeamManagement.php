<?php
//This page permits the user to manage the teams

//Files used in the page
include "../lib/NavBar.php";
include "../lib/lib.php";
include '../controle/lists/getTeamsListCtrl.php';

//Put the correct header according to the user's language
if ($_SESSION['langues'] == "Français") {
  render('header', ['title' => 'Concept&Co | Gestion des équipes']);
} else {
  render('header', ['title' => 'Concept&Co | Teams\' management']);
}
?>

<div class="container" style="margin: 10% auto auto auto">
  <div class="card" style="background-color: rgba(0, 0, 20, 0.5)">
    <div class="card-header" style="color: white">
      <?php if ($_SESSION["langues"] == "Français"): ?>
        <h3>Gestion des équipes</h3>
      <?php endif; ?>
      <?php if ($_SESSION["langues"] == "English"): ?>
        <h3>Teams' management</h3>
      <?php endif; ?>
    </div>

    <div class="card-body">
      <div style="margin: auto 10% auto 10%">
        <?php getTeamsListCtrl()  //Create a table with the differents teams and their members ?>
      </div>
    </div>
  </div>
</div>

<?php render('footer') ?>
