<?php
//This page permits the user to manage the teams

//Files used in the page
include "../lib/NavBar.php";
include "../lib/lib.php";
include '../controle/lists/getTeamsListCtrl.php';
include '../lib/lists/getMemberListTeam.php';

if ($_SESSION['malvoyant'] == "1") {
  $malvoyant = "id ='lien-malvoyant'";
}else{
  $malvoyant = "id ='lien'";
}  

//Put the correct header according to the user's language
if ($_SESSION['langues'] == "Français") {
  render('header', ['title' => 'Concept&Co | Gestion des équipes']);
} else {
  render('header', ['title' => 'Concept&Co | Teams\' management']);
}
?>

<button type="button" class="btn btn-dark" onclick="location.href='TeamAdd.php'" title="Cliquer pour ajouter une équipe" style="float: right; margin-right: 30px">
    <?php if ($_SESSION['langues'] == 'Français'): ?>
        <u>Ajouter une équipe</u>
    <?php endif; ?>
    <?php if ($_SESSION['langues'] == 'English'): ?>
        <u>Add an Team</u>
    <?php endif; ?>
</button>

<a class="btnLien" id ="lien" style="float: right; margin-right: 30px">
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
