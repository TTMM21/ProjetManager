<?php
include '../lib/lists/getTeamsList.php';

//Give the accounts in the tab, page TeamManagement.php
function getTeamsListCtrl() {
  $countList = getTeamsListCount();
  echo "<ul class='list-group'>";
  if ($_SESSION['malvoyant'] == "1") {
    $malvoyant = "id ='lien-malvoyant'";
  }else{
    $malvoyant = "id ='lien'";
  }
  if ($_SESSION['malvoyant'] == "1") {
    $malvoyant2 = "class='btn btnInactifMal'";
  }else{
    $malvoyant2 = "class='btn btnInactif'";
  }  
  if ($_SESSION['malvoyant'] == "1") {
    $malvoyant3 = "class='btn btnActifMal'";
  }else{
    $malvoyant3 = "class='btn btnActif'";
  } 
  for ($i=1; $i <= $countList ; $i++) {
    $accounts = getTeamsMemberList($i);
    $TeamsNames = getTeamsList($i);
    $id = $i;
    foreach ($TeamsNames as $TeamName) {
      $name = $TeamName['nom'];
      if ($_SESSION['langues'] == "Français") {
        echo "<li class='list-group-item' style='background-color: #ededed'><a ".$malvoyant." href='../vue/TeamManagementAdd.php?Team=".$id."' id='tableau_button'>Equipe: ".$name."</a>";
        if ($TeamName['actif'] === 1) {
            echo "<a href='..\controle\TeamDeativation.php?id_equipe=".$id."' id='btnActifEquipe' ".$malvoyant3." title='Désactiver le profil'></a></li>";
        } else {
            echo "<a href='..\controle\TeamActivation.php?id_equipe=".$id."' id='btnActifEquipe' ".$malvoyant2." title='Activer le profil'></a></li>";
        }
      } else {
        echo "<li class='list-group-item' style='background-color: #ededed'><a ".$malvoyant." href='../vue/TeamManagementAdd.php?Team=".$id."' id='tableau_button'>Team: ".$name."</a>";
        if ($TeamName['actif'] === 1) {
            echo "<a href='..\controle\TeamDeativation.php?id_equipe=".$id."' id='btnActifEquipe' ".$malvoyant3." title='Deactivate the profile'></a></li>";
        } else {
            echo "<a href='..\controle\TeamActivation.php?id_equipe=".$id."' id='btnActifEquipe' ".$malvoyant2." title='Activate the profile'></a></li>";
        }
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
