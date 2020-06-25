<?php
//include '../lib/lists/getMemberListTeam.php';

/*Give the accounts in the tab, page TeamManagement.php*/
function getTeamsListMemberCrl($name) {
    $TeamsMemberList = getTeamsMemberList($name);

    if($TeamsMemberList != null){
        echo "<select class='form-control' name='TeamMemebreRemov'>";
        echo "<option value='NULL'>selection vide</option>";
        foreach ($TeamsMemberList as $TeamsMember) {
            echo "<option value='".$TeamsMember['id_compte']."'>".$TeamsMember['nom']." ".$TeamsMember['prenom']."</option>";
        }
        echo '</select>';
    }else{
        echo '<p style="color: white; font-weight: bold;">NULL</p>';
    }
}

function getTeamsListNotMemberCrl($name) {
    $TeamsMemberList = getTeamsNotMemberList($name);
    if($TeamsMemberList != NULL){
        echo "<select class='form-control' name='TeamMemebreAdd'>";
        echo "<option value='NULL'>selection vide</option>";
        foreach ($TeamsMemberList as $TeamsMember) {
            echo "<option value='".$TeamsMember['id_compte']."'>".$TeamsMember['nom']." ".$TeamsMember['prenom']."</option>";
        }
        echo '</select>';
    }else{
        echo '<p style="color: white; font-weight: bold;">NULL</p>';
    }
}
?>