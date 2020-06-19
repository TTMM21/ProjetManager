<?php

/*Give a status's name thanks to its id*/
function getStatusName($id) {
  $req = "SELECT nom FROM statuts WHERE id_statuts = $id";
  $connection = Connect();
  $result = execQuery($connection, $req)->fetch();
  return $result['0'];
}

/*Give a language's name thanks to its id*/
function getLanguageName($id) {
  $req = "SELECT nom FROM langues WHERE id_langues = $id";
  $connection = Connect();
  $result = execQuery($connection, $req)->fetch();
  return $result['0'];
}
?>
