<?php
require '../lib/lib.php';
require '..\lib\lists\getMemberListTeam.php';

$TeamName = $_GET['Team'];

if(isset($_POST['TeamNameAdd'])){
    $pdo = Connect();
    $TeamNameAdd = $_POST['TeamNameAdd'];

    $TestName=getTeam($TeamNameAdd);

    if($TestName == NULL){
        $sql = "UPDATE equipes SET nom = '".$TeamNameAdd."' WHERE nom='".$TeamName."';";
        execQuery($pdo, $sql);
        $TeamName = $TeamNameAdd;
    }else{
        
    }
}
if(isset($_POST['TeamMemebreAdd'])){
    $TeamMemebreRemov = $_POST['TeamMemebreRemov'];
}
if(isset($_POST['TeamMemebreAdd'])){
    $TeamName = $_POST['TeamName'];
}





//Change le statut de l'élément séléctionné pour l"activer
//$sql = "UPDATE comptes SET id_equipe = '1' WHERE id_compte=$id";
//execQuery($pdo, $sql);


header("Location: ../vue/TeamManagementAdd.php?Team=$TeamName");
?>
