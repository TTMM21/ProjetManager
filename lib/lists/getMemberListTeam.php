<?php
function getTeam($name) {
  $req = "SELECT * FROM equipes WHERE nom = '$name'";

  $connection = Connect();
  $resultTeam = execQuery($connection, $req);
  
  foreach ($resultTeam as $rT) {
      $id = $rT['id_equipes'];
  }
  return $id;
}

function getTeamsMemberList($name){
  $id = getTeam($name);
  $connection = Connect();
  $sth = $connection->prepare("SELECT * FROM comptes WHERE id_equipes = $id ");
  $sth->execute();
  $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

  return $result;
}

function getTeamsNotMemberList($name){
  $id = getTeam($name);
  $connection = Connect();
  $sth = $connection->prepare("SELECT * FROM comptes WHERE id_equipes = NULL");
  $sth->execute();
  $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

  return $result;
}

?>