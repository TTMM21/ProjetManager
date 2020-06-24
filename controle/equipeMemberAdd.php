<?php
require '../lib/lib.php';
require '..\lib\lists\getMemberListTeam.php';

$TeamName = $_GET['Team'];

if(isset($_POST['TeamNameAdd']) && $_POST['TeamNameAdd'] != NULL  && $_POST['TeamNameAdd'] != " "){
    $pdo = Connect();
    $TeamNameAdd = $_POST['TeamNameAdd'];
    $TestName=getTeam($TeamNameAdd);

    if($TestName == NULL){
        $sql = "UPDATE equipes SET nom = '".$TeamNameAdd."' WHERE nom='".$TeamName."';";
        execQuery($pdo, $sql);
        $TeamName = $TeamNameAdd;
    }
}
if(isset($_POST['TeamMemebreAdd']) && $_POST['TeamMemebreAdd'] != "NULL"){
    $pdo = Connect();
    $TeamMemebreAdd = $_POST['TeamMemebreAdd'];
    $TeamID = getTeam($TeamNameAdd);
    $sql = "UPDATE comptes SET id_equipes = '".$TeamID."' WHERE id_compte = '".$TeamMemebreAdd."';";
    execQuery($pdo, $sql);
}
if(isset($_POST['TeamMemebreRemov']) && $_POST['TeamMemebreRemov'] != "NULL"){
    $pdo = Connect();
    $TeamMemebreRemov = $_POST['TeamMemebreRemov'];
    //dd($TeamMemebreRemov);
    //die();
    $sql = "UPDATE comptes SET id_equipes = NULL WHERE id_compte = '".$TeamMemebreRemov."';";
    execQuery($pdo, $sql);
}





//Change le statut de l'élément séléctionné pour l"activer
//$sql = "UPDATE comptes SET id_equipe = '1' WHERE id_compte=$id";
//execQuery($pdo, $sql);


header("Location: ../vue/TeamManagementAdd.php?Team=$TeamName");
?>
