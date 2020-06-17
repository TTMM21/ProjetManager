<?php
include '../lib/lists/getTeamsList.php';

/*Give the accounts in the tab, page TeamManagement.php*/
function getTeamsListCtrl() {
  echo "<ul class='list-group'>";
  for ($i=1; $i <=4 ; $i++) {
    $accounts = getTeamsList($i);

    if ($_SESSION['langues'] == "Français") {
      echo "<li class='list-group-item' style='background-color: #ededed'>Equipe ".$i."</li>";
    } else {
      echo "<li class='list-group-item' style='background-color: #ededed'>Team ".$i."</li>";
    }

    foreach ($accounts as $a) {
      echo "<li class='list-group-item' style='padding-left: 60px'>".$a['prenom'].' '.$a['nom']."</li>";
    }
  }
}

/*Give the select for the teams, page modifUtilisateur.php*/
function getTeamsNameListCtrl($id) {
    $teams = getTeamsNameList();
    echo "<select class='form-control' required name='id_equipes'>";
    foreach ($teams as $t) {
        if ($id === $t['id_equipes']) {
            echo "<option value='".$t["id_equipes"]."' selected>".$t["nom"]."</option>";
        } else {
            echo "<option value='".$t["id_equipes"]."'>".$t["nom"]."</option>";
        }
    }
    echo "</select>";
}
?>
