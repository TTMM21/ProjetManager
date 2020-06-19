<?php
require '../lib/lib.php';

$id = $_GET['id_tache'];
$pdo = Connect();

//Delete a task
$sql = "DELETE FROM taches WHERE id_taches=$id";
execQuery($pdo, $sql);



/*When the request is done, open index.php*/
header("Location: ../vue/index.php");
?>
