<?php
/*Change the project's status*/
session_start();

require '../lib/lib.php';
require '../lib/avancementProjet.php';

/*Permits to change the progress' status according to $_POST['avancement']*/
switch ($_POST['avancement']) {
    case "en cours":
        projetEnCours();
        break;
    case "fini":
        projetFini();
        break;
    case "en retard":
        projetEnRetard();
        break;
}

/*When the switch is done, open project.php*/
header("Location: ../vue/projet.php?id_projet=".$_GET['id_projet']);
?>
