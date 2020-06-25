<?php
/*Give all the accounts that we need*/
/*function getTeamsMemberList($id) {
  $req = "SELECT * FROM comptes WHERE id_equipes = $id ORDER BY id_equipes";
  $connection = Connect();
  $result = execQuery($connection, $req);
  return $result;
}*/

function getTeamsListCount() {
  $req = "SELECT id_equipes FROM equipes";
  $connection = Connect();
  $result = execQuery($connection, $req);
  $testgetTeamsListCount=0;
  foreach($result as $nb){
    if($testgetTeamsListCount < $nb["id_equipes"]){
      $testgetTeamsListCount = intval($nb["id_equipes"]);
    }
  }
  return $testgetTeamsListCount;
}

function getTeamsList($id) {
  $req = "SELECT nom FROM equipes WHERE id_equipes = $id ORDER BY id_equipes";
  $connection = Connect();
  $result = execQuery($connection, $req);

  return $result;
}

function getTeamsListUser() {
  $req = "SELECT * FROM equipes";
  $connection = Connect();
  $result = execQuery($connection, $req);

  return $result;
}

?>
