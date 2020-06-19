<?php
require '../lib/lib.php';

$id = $_GET['id_projet'];
$pdo = Connect();

//Delete a project ...
$sql2 = "DELETE FROM taches WHERE id_projets=$id";
execQuery($pdo, $sql2);

//... and all of its tasks
$sql = "DELETE FROM projets WHERE id_projets=$id";
execQuery($pdo, $sql);


/*When the requests are done, open index.php*/
header("Location: ../vue/index.php");
?>
