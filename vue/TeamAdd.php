<?php
//This page permits to add a user

//Files used in this page
include '../lib/lib.php';
include "../lib/NavBar.php";
include "..\lib\lists\getMemberListTeam.php";

$name = "Nouvelle Equipe";
$nameNew = $name;
$i = 0;
$a = "FALSE";
while ($a == "FALSE") {
    if($i == 0){
        $nameNew = $name;
    }else{
        $nameNew = "$name($i)";
    }
    $result = getTeam($nameNew);

    if($result == NULL){
        dd($result);
        dd($nameNew);

        $a = "TRUE";
    }else{
        $a = "FALSE";
    }
    $i ++;
}

$pdo = Connect();
$sql ="INSERT INTO equipes (nom) VALUES ('".$nameNew."');";
execQuery($pdo, $sql);
$TeamID = getTeam($nameNew);
header("Location: ../vue/TeamManagementAdd.php?Team=$TeamID");

?>
