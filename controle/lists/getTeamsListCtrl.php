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
?>
