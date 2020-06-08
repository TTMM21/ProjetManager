<?php
require '../lib/lib.php';

$id = $_GET['id_compte'];
$pdo = Connect();

//Change le statut de l'élément séléctionné pour le désactiver
$sql = "UPDATE comptes SET actif = '0' WHERE id_compte=$id";
execQuery($pdo, $sql);


header("Location: ../vue/accountManagement.php");
?>
