<?php
function getTeam($name) {
  $connection = Connect();
  $sth = $connection->prepare("SELECT * FROM equipes WHERE nom = '$name'");
  $sth->execute();
  $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

  foreach ($result as $rT) {
      $id = $rT['id_equipes'];
  }
  return $id;
}

function getTeamName($ID) {
  $connection = Connect();
  $sth = $connection->prepare("SELECT * FROM equipes WHERE id_equipes = '$ID'");
  $sth->execute();
  $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

  foreach ($result as $rT) {
      $nom = $rT['nom'];
  }
  return $nom;
}


function getTeamsMemberList($id){

  $connection = Connect();
  $sth = $connection->prepare("SELECT * FROM comptes WHERE id_equipes = $id");
  $sth->execute();
  $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

  return $result;
}

function getTeamsNotMemberList($id){

  $connection = Connect();
  $sth = $connection->prepare("SELECT * FROM comptes WHERE id_equipes IS NULL");
  $sth->execute();
  $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

  return $result;
}

?>