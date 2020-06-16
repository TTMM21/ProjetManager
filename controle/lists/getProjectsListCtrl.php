<?php
include '../lib/lists/getProjectsList.php';

/*Give the projects in the tab, page index.php*/
function getProjectsListCtrl($id_equipes) {
  $projects = getProjectsList($id_equipes);
  echo "<table class='table table-striped table-hover' style='background-color: white'>";
  echo "<thead>";
  echo "<tr>";
  if ($_SESSION['langues'] == "Français") {
    echo "<th>Nom</th>";
    echo "<th>Date de fin</th>";
  } else {
    echo "<th>Name</th>";
    echo "<th>Deadline</th>";
  }
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  foreach ($projects as $p) {
    echo "<tr>";
    echo "<td><a href='../vue/projet.php?id_projet=".$p['id_projets']."'>".$p['nom'].'</a></td>';
    echo "<td><a href='../vue/projet.php?id_projet=".$p['id_projets']."'>".$p['date_de_fin'].'</a></td>';
  }
  echo "</tbody>";
  echo "</table>";
}

/*Give the projects in the tab, page projectsFinished.php*/
function getProjectsFinishedListCtrl($id_equipes) {
  $projects = getProjectsFinishedList($id_equipes);
  echo "<table class='table table-striped table-hover' style='background-color: white'>";
  echo "<thead>";
  echo "<tr>";
  if ($_SESSION['langues'] == "Français") {
    echo "<th>Nom</th>";
    echo "<th>Date de fin</th>";
  } else {
    echo "<th>Name</th>";
    echo "<th>Deadline</th>";
  }
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  foreach ($projects as $p) {
    echo "<tr>";
    echo "<td><a href='../vue/projet.php?id_projet=".$p['id_projets']."'>".$p['nom'].'</a></td>';
    echo "<td><a href='../vue/projet.php?id_projet=".$p['id_projets']."'>".$p['date_de_fin'].'</a></td>';
  }
  echo "</tbody>";
  echo "</table>";
}
?>
