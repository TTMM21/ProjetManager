<?php
session_start();
require '../lib/lib.php';
echo $_SESSION["id"];
$id = $_SESSION["id"];
$pdo = Connect();

$sql = "UPDATE comptes SET id_langues = '2' WHERE id_compte=$id";
execQuery($pdo, $sql);

$_SESSION["langues"] = "English";

header("Location: ../vue/index.php");
?>
