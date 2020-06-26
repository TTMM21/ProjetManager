<?php
session_start();
require '../lib/lib.php';
echo $_SESSION["id"];
$id = $_SESSION["id"];
$pdo = Connect();

$sql = "UPDATE comptes SET malvoyant = '0' WHERE id_compte=$id";
execQuery($pdo, $sql);

$_SESSION["malvoyant"] = "0";

header("Location: ../vue/index.php");
?>
