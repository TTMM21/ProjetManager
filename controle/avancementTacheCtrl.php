<?php
/*Change the task's status*/
session_start();

require '../lib/lib.php';
require '../lib/avancementTache.php';

switch ($_POST['avancement']) {
    case "en cours":
        tacheEnCours();
        break;
    case "fini":
        tacheFini();
        break;
    case "en retard":
        tacheEnRetard();
        break;
}


header("Location: ../vue/tache.php?id_tache=".$_GET['id_tache']);
?>
