<?php
include '../lib/lists/getTeamsList.php';

//Give the accounts in the tab, page TeamManagement.php
function getTeamsListCtrl() {
  $countList = getTeamsListCount();
  echo "<ul class='list-group'>";


  for ($i=1; $i <= $countList ; $i++) {
    $accounts = getTeamsMemberList($i);
    $TeamsNames = getTeamsList($i);
    $id = $i;
    foreach ($TeamsNames as $TeamName) {
      $name = $TeamName['nom'];
      if ($_SESSION['langues'] == "Français") {
        echo "<li class='list-group-item' style='background-color: #ededed'><a href='../vue/TeamManagementAdd.php?Team=".$id."' id='tableau_button'>Equipe: ".$name."</a></li>";
      } else {
        echo "<li class='list-group-item' style='background-color: #ededed'><a href='../vue/TeamManagementAdd.php?Team=".$id."' id='tableau_button'>Team: ".$name."</a></li>";
      }
    }
    
    foreach ($accounts as $a) {
      echo "<li class='list-group-item' style='padding-left: 60px'>".$a['prenom'].' '.$a['nom']."</li>";
    }
  }
}

/*Give the select for the teams (in the form), page modifUtilisateur.php + addUser.php*/
function getTeamsNameListCtrl($id) {
  $team = getTeamsListUser();
  echo "<select class='form-control' required name='id_equipes'>";
  foreach ($team as $t) {
      if ($id === $t['id_equipes']) {
          echo "<option value='".$t["id_equipes"]."' selected>".$t["nom"]."</option>";
      } else {
          echo "<option value='".$t["id_equipes"]."'>".$t["nom"]."</option>";
      }
  }
  echo "</select>";
}
?>
