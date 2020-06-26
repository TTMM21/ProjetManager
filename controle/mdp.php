<?php

include "../lib/lib.php";

$mdp = $_POST['LOGIN-MDP'];
$mdpconfirm = $_POST['LOGIN-MDPCONFIRM'];
$id = $_GET['id'];


if($mdp = $mdpconfirm ){
    $connection = Connect();
    $sth = $connection->prepare("SELECT `id_compte` FROM `comptes`  WHERE `mdp` = '$id';");
    $sth->execute();
    $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
  
    foreach ($result as $rT) {
        $iduser = $rT['id_compte'];
        echo $iduser;
    }
    echo $iduser;
    echo $mdp;
    $sql = "UPDATE `comptes` SET `mdp`= '$mdp' ,`actif`= '1'  WHERE id_compte = '$iduser';";
    $connection = Connect();
    $result = execQuery($connection, $sql);
}



header("Location: ../vue/login.php");
?>