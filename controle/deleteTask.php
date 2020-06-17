<?php
require '../lib/lib.php';

$id = $_GET['id_tache'];
$pdo = Connect();

//Delete a project and all of its tasks
$sql = "DELETE FROM taches WHERE id_taches=$id";
execQuery($pdo, $sql);


header("Location: ../vue/index.php");
?>
