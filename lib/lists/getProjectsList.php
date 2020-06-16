<?php
/*Give all the tasks that we need, except the ones whose are finished*/
function getProjectsList($id_equipes) {
  $req = "SELECT * FROM projets WHERE id_equipes = $id_equipes AND (id_avancements = 1 OR id_avancements = 3) ORDER BY date_de_fin";
  $connection = Connect();
  $result = execQuery($connection, $req);
  return $result;
}

/*Give all the tasks that we need, only the ones whose are finished*/
function getProjectsFinishedList($id_equipes) {
  $req = "SELECT * FROM projets WHERE id_equipes = $id_equipes AND id_avancements = 2 ORDER BY date_de_fin";
  $connection = Connect();
  $result = execQuery($connection, $req);
  return $result;
}
?>
