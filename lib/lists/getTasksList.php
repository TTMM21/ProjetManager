<?php
/*Give all the tasks that we need, except the ones whose are finished*/
function getTasksList($id_comptes) {
  $req = "SELECT * FROM taches WHERE id_comptes = $id_comptes AND (id_avancements = 1 OR id_avancements = 3) ORDER BY date_de_fin";
  $connection = Connect();
  $result = execQuery($connection, $req);
  return $result;
}

/*Give all the tasks that we need, only the finished tasks*/
function getTasksFinishedList($id_comptes) {
  $req = "SELECT * FROM taches WHERE id_comptes = $id_comptes AND id_avancements = 2 ORDER BY date_de_fin";
  $connection = Connect();
  $result = execQuery($connection, $req);
  return $result;
}
?>
