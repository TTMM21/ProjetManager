<?php
session_start();
require '../lib/lib.php';
echo $_SESSION["id"];
$id = $_SESSION["id"];
$pdo = Connect();

$sql = "UPDATE comptes SET id_langues = '1' WHERE id_compte=$id";
execQuery($pdo, $sql);

$_SESSION["langues"] = "Français";

header("Location: ../vue/index.php");
?>
