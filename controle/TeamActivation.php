<?php
require '../lib/lib.php';

$id = $_GET['id_equipe'];
$pdo = Connect();

//Change the account's status to 1 (activate)
$sql = "UPDATE equipes SET actif = '1' WHERE id_equipes=$id";
execQuery($pdo, $sql);


header("Location: ../vue/TeamManagement.php");
?>
