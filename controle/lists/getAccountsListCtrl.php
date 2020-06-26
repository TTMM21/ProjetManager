<?php
include '../lib/lists/getAccountsList.php';

/*Give the accounts in the tab, page AccountManagement.php*/
function getAccountsListCtrl() {
  $accounts = getAccountsList();
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
  echo "<table class='table table-striped table-hover' style='background-color: white'>";
  echo "<thead>";
  echo "<tr>";
  if ($_SESSION['langues'] == "Français") {
    echo "<th>Nom</th>";
    echo "<th>Prénom</th>";
    echo "<th>Compte actif</th>";
  } else {
    echo "<th>Last name</th>";
    echo "<th>First name</th>";
    echo "<th>Account activated</th>";
  }
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  foreach ($accounts as $a) {
    echo "<tr>";
    echo "<td><a ".$malvoyant." href='../vue/utilisateur.php?id_compte=".$a['id_compte']."'>".$a['nom'].'</a></td>';
    echo "<td><a ".$malvoyant." href='../vue/utilisateur.php?id_compte=".$a['id_compte']."'>".$a['prenom'].'</a></td>';
    if ($a['actif'] === 1) {
      if ($_SESSION['langues'] == "Français") {
        echo "<td><a  href='../controle/accountDeactivation.php?id_compte=".$a['id_compte']."' ".$malvoyant3." title='Désactiver le profil'></a></td>";
      } else {
        echo "<td><a  href='../controle/accountDeactivation.php?id_compte=".$a['id_compte']."' ".$malvoyant3." title='Deactivate the profile'></a></td>";
      }
    } else {
      if ($_SESSION['langues'] == "Français") {
        echo "<td><a href='../controle/accountActivation.php?id_compte=".$a['id_compte']."' ".$malvoyant2." title='Activer le profil'></a></td>";
      } else {
        echo "<td><a href='../controle/accountActivation.php?id_compte=".$a['id_compte']."' ".$malvoyant2." title='Activate the profile'></a></td>";
      }
    }
    echo "<td><a ".$malvoyant." href='../vue/modifUtilisateur.php?id_compte=".$a['id_compte']."' class='btnLien'>";
        if ($_SESSION['langues'] == 'Français') {
            echo "Modifier";
        } elseif ($_SESSION['langues'] == 'English') {
            echo "Modify";
        }
    echo "</a></td>";
  }
  echo "</tbody>";
  echo "</table>";
}

/*Give the select of the employees (in the form), page addTask.php*/
function getEmployeesListCtrl() {
    $accounts = getEmployeesList();
    echo "<select class='form-control' required name='id_comptes'>";
    foreach ($accounts as $a) {
        if ($id === $a['id_compte']) {
            echo "<option value='".$a["id_compte"]."' selected>".$a["nom"]." ".$a["prenom"]."</option>";
        } else {
            echo "<option value='".$a["id_compte"]."'>".$a["nom"]." ".$a["prenom"]."</option>";
        }
    }
    echo "</select>";
}
?>
