<?php
require '../lib/lib.php';

$id = $_GET['id_equipe'];
$pdo = Connect();

//Change the account's status to 0 (deactivate)
$sql = "UPDATE equipes SET actif = '0' WHERE id_equipes=$id";
execQuery($pdo, $sql);

header("Location: ../vue/TeamManagement.php");
?>
