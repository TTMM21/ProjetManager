<?php

/*Give all the status that we need*/
function getStatutsList() {
  $req = "SELECT * FROM statuts";
  $connection = Connect();
  $result = execQuery($connection, $req);
  return $result;
}
?>
