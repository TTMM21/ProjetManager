<?php
require '../lib/lib.php';
require '..\lib\lists\getMemberListTeam.php';

$TeamID = $_GET['Team'];
$TestName=getTeamName($TeamNameAdd);

if(isset($_POST['TeamNameAdd']) && $_POST['TeamNameAdd'] != NULL  && $_POST['TeamNameAdd'] != " "){
    $pdo = Connect();
    $TeamNameAdd = $_POST['TeamNameAdd'];

    if($TestName != NULL){
        $sql = "UPDATE equipes SET nom = '".$TeamNameAdd."' WHERE id_equipes='".$TeamID."';";
        execQuery($pdo, $sql);
        $TeamName = $TeamNameAdd;
    }
}
if(isset($_POST['TeamMemebreAdd']) && $_POST['TeamMemebreAdd'] != "NULL"){
    $pdo = Connect();
    $TeamMemebreAdd = $_POST['TeamMemebreAdd'];
    $sql = "UPDATE comptes SET id_equipes = '".$TeamID."' WHERE id_compte = '".$TeamMemebreAdd."';";
    execQuery($pdo, $sql);
}
if(isset($_POST['TeamMemebreRemov']) && $_POST['TeamMemebreRemov'] != "NULL"){
    $pdo = Connect();
    $TeamMemebreRemov = $_POST['TeamMemebreRemov'];
    $sql = "UPDATE comptes SET id_equipes = NULL WHERE id_compte = '".$TeamMemebreRemov."';";
    execQuery($pdo, $sql);
}

header("Location: ../vue/TeamManagement.php");
?>
