<?php
/*Give all the tasks that we need*/
function getTasksList($id_comptes) {
  $req = "SELECT * FROM taches WHERE id_comptes = $id_comptes ORDER BY date_de_fin";
  $connection = Connect();
  $result = execQuery($connection, $req);
  return $result;
}
?>
