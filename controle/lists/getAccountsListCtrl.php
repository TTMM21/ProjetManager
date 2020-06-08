<?php
include '../lib/lists/getAccountsList.php';

/*Give the accounts in the tab, page AccountManagement.php*/
function getAccountsListCtrl() {
  $accounts = getAccountsList();
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
    echo "<td><a href='../vue/utilisateur.php?id_compte=".$a['id_compte']."'>".$a['nom'].'</a></td>';
    echo "<td><a href='../vue/utilisateur.php?id_compte=".$a['id_compte']."'>".$a['prenom'].'</a></td>';
    if ($a['actif'] === 1) {
      if ($_SESSION['langues'] == "Français") {
        echo "<td><a href='../controle/accountDeactivation.php?id_compte=".$a['id_compte']."' class='btn btnActif' title='Désactiver le profil'></a></td>";
      } else {
        echo "<td><a href='../controle/accountDeactivation.php?id_compte=".$a['id_compte']."' class='btn btnActif' title='Deactivate the profile'></a></td>";
      }
    } else {
      if ($_SESSION['langues'] == "Français") {
        echo "<td><a href='../controle/accountActivation.php?id_compte=".$a['id_compte']."' class='btn btnInactif' title='Activer le profil'></a></td>";
      } else {
        echo "<td><a href='../controle/accountActivation.php?id_compte=".$a['id_compte']."' class='btn btnInactif' title='Activate the profile'></a></td>";
      }
    }
  }
  echo "</tbody>";
  echo "</table>";
}
?>