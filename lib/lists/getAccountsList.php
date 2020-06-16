<?php
/*Give all the accounts that we need*/
function getAccountsList() {
  $req = "SELECT * FROM comptes";
  $connection = Connect();
  $result = execQuery($connection, $req);
  return $result;
}

/*Give all the employees*/
function getEmployeesList() {
  $req = "SELECT * FROM comptes WHERE (id_statuts = 3 OR id_statuts = 2)";
  $connection = Connect();
  $result = execQuery($connection, $req);
  return $result;
}
?>
