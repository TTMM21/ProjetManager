<?php

function getAllProjectsList($id_equipes) {
  $connection = Connect();
  $sth = $connection->prepare("SELECT * FROM historique_projet where id_equipes = $id_equipes");
  $sth->execute();
  $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
  return $result;
}

function getAllHistoriqueProjectsList($id_comptes) {
    $connection = Connect();
    $sth = $connection->prepare("SELECT * FROM historique_projet where id_comptes = ".$id_comptes.";");
    $sth->execute();
    $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
    return $result;
  }

  function SetHistoriqueProjects($id_comptes, $id_projet,$id_taches) {
    $connection = Connect();
    $sth = $connection->prepare("INSERT INTO historique_projet ('id_comptes', 'id_projet','id_taches') VALUES ('".$id_comptes."','".$id_projet."','".$id_taches."');");
    $sth->execute();
    $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
    return $result;
  }


?>