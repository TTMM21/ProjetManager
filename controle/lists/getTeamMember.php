<?php
include '../lib/lists/getMemberListTeam.php';

/*Give the accounts in the tab, page TeamManagement.php*/
function getTeamsListMemberCrl($name) {
    $TeamsMemberList = getTeamsMemberList($name);

    if($TeamsMemberList != null){
        echo "<select name='TeamMemebreRemov'>";
        echo "<option value='NULL'>selection vide</option>";
        foreach ($TeamsMemberList as $TeamsMember) {
            echo "<option value='".$TeamsMember['id_compte']."'>".$TeamsMember['nom']." ".$TeamsMember['prenom']."</option>";
        }
        echo '</select>';
        
    }else{
        echo 'NULL';
    }
}


function getTeamsListNotMemberCrl($name) {
    $TeamsMemberList = getTeamsNotMemberList($name);

    if($TeamsMemberList != null){
        echo "<select name='TeamMemebreAdd'>";
        echo "<option value='NULL'>selection vide</option>";
        foreach ($TeamsMemberList as $TeamsMember) {
            echo "<option value='".$TeamsMember['id_compte']."'>".$TeamsMember['nom']." ".$TeamsMember['prenom']."</option>";
        }
        echo '</select>';
        
    }else{
        echo 'NULL';
    }
}
?>