<?php
/*Give all the accounts that we need*/
function getAccountsList() {
  $req = "SELECT * FROM comptes";
  $connection = Connect();
  $result = execQuery($connection, $req);
  return $result;
}
?>
