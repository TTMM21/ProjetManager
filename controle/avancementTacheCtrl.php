<?php
/*Change the task's status*/
session_start();

require '../lib/lib.php';
require '../lib/avancementTache.php';

/*Permits to change the progress' status according to $_POST['avancement']*/
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


/*When the switch is done, open project.php*/
header("Location: ../vue/tache.php?id_tache=".$_GET['id_tache']);
?>
