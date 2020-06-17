<?php
include '../lib/lists/getStatutsList.php';

/*Give the select for the status, page modifUtilisateur.php*/
function getStatutsListCtrl($id) {
    $status = getStatutsList();
    echo "<select class='form-control' required name='id_statuts'>";
    foreach ($status as $s) {
        if ($id === $s['id_statuts']) {
            echo "<option value='".$s["id_statuts"]."' selected>".$s["nom"]."</option>";
        } else {
            echo "<option value='".$s["id_statuts"]."'>".$s["nom"]."</option>";
        }
    }
    echo "</select>";
}
?>
