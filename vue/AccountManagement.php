<?php
//This page permits the user to manage the accounts

//Files used in the page
include "../lib/NavBar.php";
include "../lib/lib.php";
include '../controle/lists/getAccountsListCtrl.php';

//Put the correct header according to the user's language
if ($_SESSION['langues'] == "Français") {
  render('header', ['title' => 'Concept&Co | Gestion des comptes']);
} else {
  render('header', ['title' => 'Concept&Co | Accounts\' management']);
}
if ($_SESSION['malvoyant'] == "1") {
  $malvoyant = "id ='lien-malvoyant'";
}else{
  $malvoyant = "id ='lien'";
}  
?>
<!--Button which links to the page addUser.php-->

<button type="button" class="btn btn-dark" onclick="location.href='addUser.php'" title="Cliquer pour ajouter une équipe" style="float: right; margin-right: 30px">
    <?php if ($_SESSION['langues'] == 'Français'): ?>
      Ajouter un utilisateur
    <?php endif; ?>
    <?php if ($_SESSION['langues'] == 'English'): ?>
      Add an user
    <?php endif; ?>
</button>

<!--Tab for the accounts' management-->
<div class="container" style="margin: 10% auto auto auto">
  <div class="card" style="background-color: rgba(0, 0, 20, 0.5)">
    <div class="card-header" style="color: white">
      <?php if ($_SESSION["langues"] == "Français"): ?>
        <h3>Gestion des comptes</h3>
      <?php endif; ?>
      <?php if ($_SESSION["langues"] == "English"): ?>
        <h3>Accounts' management</h3>
      <?php endif; ?>
    </div>

    <div class="card-body">
      <div style="margin: auto 10% auto 10%">
        <?php getAccountsListCtrl()  //Create a table with all the users' accounts ?>
      </div>
    </div>
  </div>
</div>

<?php render('footer') ?>
