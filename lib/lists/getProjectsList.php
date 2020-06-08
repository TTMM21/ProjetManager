<?php
/*Give all the tasks that we need*/
function getProjectsList($id_equipes) {
  $req = "SELECT * FROM projets WHERE id_equipes = $id_equipes ORDER BY date_de_fin";
  $connection = Connect();
  $result = execQuery($connection, $req);
  return $result;
}
?>
