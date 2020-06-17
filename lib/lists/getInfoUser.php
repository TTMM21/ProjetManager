<?php

function getStatusName($id) {
  $req = "SELECT nom FROM statuts WHERE id_statuts = $id";
  $connection = Connect();
  $result = execQuery($connection, $req)->fetch();
  return $result['0'];
}

function getLanguageName($id) {
  $req = "SELECT nom FROM langues WHERE id_langues = $id";
  $connection = Connect();
  $result = execQuery($connection, $req)->fetch();
  return $result['0'];
}
?>
