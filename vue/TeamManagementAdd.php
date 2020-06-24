<?php
//This page permits the user to manage the teams

//Files used in the page
include "../lib/NavBar.php";
include "../lib/lib.php";
include '../controle/lists/getTeamMember.php';
include '../lib/lists/getMemberListTeam.php';

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
            <p>Team name add: <input type="text" name="TeamNameAdd"/></p>

            <p>Team member add: <?php getTeamsListNotMemberCrl($TeamID); ?></p>

            <p>Team member remouv: <?php getTeamsListMemberCrl($TeamID); ?></p>
            <input type="submit" value="OK">
        </form>
      </div>
    </div>
  </div>
</div>

<?php render('footer') ?>
