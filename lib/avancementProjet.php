<?php

//Change the project's status to "in progress"
function projetEnCours() {
    $req = "UPDATE projets SET id_avancements = 1 WHERE id_projets =".$_GET['id_projet'];
    $connection = Connect();
    $result = execQuery($connection, $req)->fetch();
    return $result['0'];
}

//Change the project's status to "finished"
function projetFini() {
    $req = "UPDATE projets SET id_avancements = 2 WHERE id_projets =".$_GET['id_projet'];
    $connection = Connect();
    $result = execQuery($connection, $req)->fetch();
    return $result['0'];
}

//Change the project's status to "late"
function projetEnRetard() {
    $req = "UPDATE projets SET id_avancements = 3 WHERE id_projets =".$_GET['id_projet'];
    $connection = Connect();
    $result = execQuery($connection, $req)->fetch();
    return $result['0'];
}
?>
