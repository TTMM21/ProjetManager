<?php
require '../lib/lib.php';

$id = $_GET['id_compte'];
$pdo = Connect();

//Change le statut de l'élément séléctionné pour l"activer
$sql = "UPDATE comptes SET actif = '1' WHERE id_compte=$id";
execQuery($pdo, $sql);


header("Location: ../vue/accountManagement.php");
?>
