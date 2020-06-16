<?php

//Change the task's status to "in progress"
function tacheEnCours() {
    $req = "UPDATE taches SET id_avancements = 1 WHERE id_taches =".$_GET['id_tache'];
    $connection = Connect();
    $result = execQuery($connection, $req)->fetch();
    return $result['0'];
}

//Change the task's status to "finished"
function tacheFini() {
    $req = "UPDATE taches SET id_avancements = 2 WHERE id_taches =".$_GET['id_tache'];
    $connection = Connect();
    $result = execQuery($connection, $req)->fetch();
    return $result['0'];
}

//Change the task's status to "late"
function tacheEnRetard() {
    $req = "UPDATE taches SET id_avancements = 3 WHERE id_taches =".$_GET['id_tache'];
    $connection = Connect();
    $result = execQuery($connection, $req)->fetch();
    return $result['0'];
}
?>
