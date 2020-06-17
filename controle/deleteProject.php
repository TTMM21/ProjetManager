<?php
require '../lib/lib.php';

$id = $_GET['id_projet'];
$pdo = Connect();

//Delete a project and all of its tasks
$sql2 = "DELETE FROM taches WHERE id_projets=$id";
execQuery($pdo, $sql2);

$sql = "DELETE FROM projets WHERE id_projets=$id";
execQuery($pdo, $sql);


header("Location: ../vue/index.php");
?>
