<?php

function getProjectName($id) {
  $req = "SELECT nom FROM projets WHERE id_projets = $id";
  $connection = Connect();
  $result = execQuery($connection, $req)->fetch();
  return $result['0'];
}

function getUserName($id) {
  $req = "SELECT prenom FROM comptes WHERE id_compte = $id";
  $connection = Connect();
  $result = execQuery($connection, $req)->fetch();
  return $result['0'];
}
?>
