<?php
/*Give all the accounts that we need*/
function getTeamsList($id) {
  $req = "SELECT * FROM comptes WHERE id_equipes = $id ORDER BY id_equipes";
  $connection = Connect();
  $result = execQuery($connection, $req);
  return $result;
}

/*Give all the teams that we need*/
function getTeamsNameList() {
  $req = "SELECT * FROM equipes";
  $connection = Connect();
  $result = execQuery($connection, $req);
  return $result;
}
?>
