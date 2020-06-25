<?php
//This page permits the user to manage the teams

//Files used in the page
include "../lib/NavBar.php";
include "../lib/lib.php";
require '../vendor/autoload.php';
include '../controle/lists/getTeamMember.php';
include '../controle/lists/getTeamsListCtrl.php';
include '../lib/lists/getMemberListTeam.php';

if ($_SESSION['malvoyant'] == "1") {
  $malvoyant = "id ='lien-malvoyant'";
}else{
  $malvoyant = "id ='lien'";
}  

$TeamID = $_GET['Team'];
$TeamName = getTeamName($TeamID);

//Put the correct header according to the user's language
if ($_SESSION['langues'] == "Français") {
  render('header', ['title' => "Concept&Co | Gestion ".$TeamName]);
} else {
  render('header', ['title' => "Concept&Co | Teams\' management".$TeamName]);
}
?>

<div class="container" style="margin: 10% auto auto auto">
  <div class="card" style="background-color: rgba(0, 0, 20, 0.5)">
    <div class="card-header" style="color: white">
      <?php if ($_SESSION["langues"] == "Français"): ?>
        <h3>Gestion de l'équipe <?= $TeamName ?></h3>
      <?php endif; ?>
      <?php if ($_SESSION["langues"] == "English"): ?>
        <h3>Teams' management <?= $TeamName ?></h3>
      <?php endif; ?>
    </div>

    <div class="card-body">
      <div style="margin: auto 10% auto 10%">
        <form action="../controle/equipeMemberAdd.php?Team=<?=$TeamID?>" method="post">   
            <div class="form-group">
              <?php if ($_SESSION['langues'] == 'Français'): ?>
                <label for="nom" style="color: white"><b>Nouveau nom d'equipe :</b></label>
              <?php endif; ?>
              <?php if ($_SESSION['langues'] == 'English'): ?>
                <label for="nom" style="color: white"><b>Team name add:</b></label>
              <?php endif; ?>
                <input type="text" class="form-control" name="TeamNameAdd"/>
            </div>   

            <div class="form-group">
              <?php if ($_SESSION['langues'] == 'Français'): ?>
                <label for="nom" style="color: white"><b>Nouveau membre dans l'equipe : </b></label>
              <?php endif; ?>
              <?php if ($_SESSION['langues'] == 'English'): ?>
                <label for="nom" style="color: white"><b>Team member add:</b></label>
              <?php endif; ?>
                <?php getTeamsListNotMemberCrl($TeamID); ?>
            </div>   

            <div class="form-group">
              <?php if ($_SESSION['langues'] == 'Français'): ?>
                <label for="nom" style="color: white"><b>Retirer membre de l'equipe : </b></label>
              <?php endif; ?>
              <?php if ($_SESSION['langues'] == 'English'): ?>
                <label for="nom" style="color: white"><b>Team member remove:</b></label>
              <?php endif; ?>
                <?php getTeamsListMemberCrl($TeamID); ?>
            </div>   
            <?php if ($_SESSION['langues'] == 'Français'): ?>
              <button type="submit" class="btn btn-success"><b>VALIDER</b></button>
            <?php endif; ?>
            <?php if ($_SESSION['langues'] == 'English'): ?>
              <button type="submit" class="btn btn-success"><b>SUBMIT</b></button>
            <?php endif; ?>
            
        </form>
      </div>
      <div class="card-body">
        <div style="margin: auto 10% auto 10%">
          <?php
            echo "<ul class='list-group'>";
              $accounts = getTeamsMemberList($TeamID);
              $TeamsNames = getTeamsList($TeamID);
              foreach ($TeamsNames as $TeamName) {
                $name = $TeamName['nom'];
              }

            if ($_SESSION['langues'] == "Français") {
              echo "<li class='list-group-item' style='background-color: #ededed'><a id='lien' id='tableau_button'>Equipe: ".$name."</a></li>";
            } else {
              echo "<li class='list-group-item' style='background-color: #ededed'><a id='lien' id='tableau_button'>Team: ".$name."</a></li>";
            }

            foreach ($accounts as $a) {
              echo "<li class='list-group-item' style='padding-left: 60px'>".$a['prenom'].' '.$a['nom']."</li>";
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php render('footer') ?>
