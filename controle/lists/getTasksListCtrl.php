<?php
include '../lib/lists/getTasksList.php';

/*Give the projects in the tab, page index.php*/
function getTasksListCtrl($id_comptes) {
  $tasks = getTasksList($id_comptes);
  echo "<table class='table table-striped table-hover' style='background-color: white'>";
  echo "<thead>";
  echo "<tr>";
  if ($_SESSION['langues'] == "Français") {
    echo "<th>Nom de la tâche</th>";
    echo "<th>Nom du projet</th>";
    echo "<th>Date de fin</th>";
  } else {
    echo "<th>Task's name</th>";
    echo "<th>Project's name</th>";
    echo "<th>Deadline</th>";
  }
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  foreach ($tasks as $t) {
    echo "<tr>";
    echo "<td><a href='../vue/tache.php?id_tache=".$t['id_taches']."'>".$t['nom']."</a></td>";
    echo "<td><a href='../vue/tache.php?id_tache=".$t['id_taches']."'>".getProjectName($t['id_projets'])."</a></td>";
    echo "<td><a href='../vue/tache.php?id_tache=".$t['id_taches']."'>".$t['date_de_fin']."</a></td>";
  }
  echo "</tbody>";
  echo "</table>";
}


/*Give the projects in the tab, page tasksFinished.php*/
function getTasksFinishedListCtrl($id_comptes) {
  $tasks = getTasksFinishedList($id_comptes);
  echo "<table class='table table-striped table-hover' style='background-color: white'>";
  echo "<thead>";
  echo "<tr>";
  if ($_SESSION['langues'] == "Français") {
    echo "<th>Nom de la tâche</th>";
    echo "<th>Nom du projet</th>";
    echo "<th>Date de fin</th>";
  } else {
    echo "<th>Task's name</th>";
    echo "<th>Project's name</th>";
    echo "<th>Deadline</th>";
  }
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  foreach ($tasks as $t) {
    echo "<tr>";
    echo "<td><a href='../vue/tache.php?id_tache=".$t['id_taches']."'>".$t['nom']."</a></td>";
    echo "<td><a href='../vue/tache.php?id_tache=".$t['id_taches']."'>".getProjectName($t['id_projets'])."</a></td>";
    echo "<td><a href='../vue/tache.php?id_tache=".$t['id_taches']."'>".$t['date_de_fin']."</a></td>";
  }
  echo "</tbody>";
  echo "</table>";
}


function getProjectName($id) {
  $req = "SELECT nom FROM projets WHERE id_projets = $id";
  $connection = Connect();
  $result = execQuery($connection, $req)->fetch();
  return $result['0'];
}
?>
