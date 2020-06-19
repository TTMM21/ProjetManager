<?php

/*Give a project's name thanks to its id*/
function getProjectName($id) {
  $req = "SELECT nom FROM projets WHERE id_projets = $id";
  $connection = Connect();
  $result = execQuery($connection, $req)->fetch();
  return $result['0'];
}

/*Give a user's first name thanks to its id*/
function getUserName($id) {
  $req = "SELECT prenom FROM comptes WHERE id_compte = $id";
  $connection = Connect();
  $result = execQuery($connection, $req)->fetch();
  return $result['0'];
}
?>
