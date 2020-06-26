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

  for ($i=1; $i <= $countList ; $i++) {
    $accounts = getTeamsMemberList($i);
    $TeamsNames = getTeamsList($i);
    $id = $i;
    foreach ($TeamsNames as $TeamName) {
      $name = $TeamName['nom'];
      if ($_SESSION['langues'] == "Français") {
        echo "<li class='list-group-item' style='background-color: #ededed'><a ".$malvoyant." href='../vue/TeamManagementAdd.php?Team=".$id."' id='tableau_button'>Equipe: ".$name."</a>";
        if ($TeamName['actif'] === 1) {
          if ($_SESSION['langues'] == "Français") {
            echo "<a href='..\controle\TeamDeativation.php?id_equipe=".$id."' id='btnActifEquipe' class='btn btnActif' title='Désactiver le profil'></a></li>";
          } else {
            echo "<a href='..\controle\TeamDeativation.php?id_equipe=".$id."' id='btnActifEquipe' class='btn btnActif' title='Deactivate the profile'></a></li>";
          }
        } else {
          if ($_SESSION['langues'] == "Français") {
            echo "<a href='..\controle\TeamActivation.php?id_equipe=".$id."' id='btnActifEquipe' class='btn btnInactif' title='Activer le profil'></a></li>";
          } else {
            echo "<a href='..\controle\TeamActivation.php?id_equipe=".$id."' id='btnActifEquipe' class='btn btnInactif' title='Activate the profile'></a></li>";
          }
        }
      } else {
        echo "<li class='list-group-item' style='background-color: #ededed'><a ".$malvoyant." href='../vue/TeamManagementAdd.php?Team=".$id."' id='tableau_button'>Team: ".$name."</a></li>";
      }
    }
    
    foreach ($accounts as $a) {
      echo "<li class='list-group-item' style='padding-left: 60px'>".$a['prenom'].' '.$a['nom']."</li>";
    }
  }
}

/*Give the select for the teams (in the form), page modifUtilisateur.php + addUser.php*/
function getTeamsNameListCtrl() {
  $team = getTeamsListUser();
  echo "<select class='form-control' required name='id_equipes'>";
  foreach ($team as $t) {
    if($t["actif"] == 1){
          echo "<option value='".$t["id_equipes"]."'>".$t["nom"]."</option>";
        }
  }
  echo "</select>";
}
?>
