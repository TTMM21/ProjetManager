<?php
session_start();
include "../lib/lib.php";
$i=0;

//variable versification
$allIsFine = true;
if(isset($_POST['LOGIN-MAIL'])=== false ){
    $allIsFine = false;
}
if(isset($_POST['LOGIN-MDP'])=== false || $_POST['LOGIN-MDP'] == ""){
    $allIsFine =false;
}   

//get info
if($allIsFine === true){
    $login = $_POST['LOGIN-MAIL'];
    $password = $_POST['LOGIN-MDP'];
    $connection = Connect();
    $sql = "SELECT * FROM  comptes WHERE email = '".$login."' AND  mdp = '".$password."';";
     
    $result = execQuery($connection,$sql);
    //set variable 

    foreach($result as $row){
        $mail = $row["email"]; 
        $Nom = $row["nom"];
        $Prenom = $row["prenom"];
        $Actif = $row["actif"];
        $malvoyant = $row["malvoyant"];
        $id_langues = $row["id_langues"];
        $ID_EQUIPES = $row["id_equipes"];
        $id_statuts = $row["id_statuts"];
    }

    $sql = "SELECT * FROM  langues WHERE id_langues = '".$id_langues."';";
     
    $result = execQuery($connection,$sql);

    foreach($result as $row){
        $id_langues = $row["nom"];
    }

    $sql = "SELECT * FROM  statuts WHERE id_statuts = '".$id_statuts."';";
     
    $result = execQuery($connection,$sql);

    foreach($result as $row){
        $id_statuts = $row["nom"];
    }



    //versification of account information
    if(isset($mail)) {
        if($Actif == 1){
            echo "connection validée";
            $_SESSION["mail"]=$mail;
            $_SESSION["Nom"]=$Nom;
            $_SESSION["Prenom"]=$Prenom;
            $_SESSION["statuts"]=$id_statuts;
            $_SESSION["langues"]=$id_langues;
            $_SESSION["malvoyant"]=$malvoyant;
            header('Location: ../vue/compte.php');
            exit();

        }else{
            //texte
            ErreurMSG('ton adm ne t\'aime pas du coup ton compte n\'est pas activé dommage.  on vous aime comme vous etes. <3');
        }
    }else{
        //texte
        ErreurMSG('ok biche merci <3<3<3 si non c\'est : "le mdp ou le mdp et aussi le MDP ou aussi le FPS ou aussi les FPS ou aussi les deux con qui parle la merde quoi c\'est quoi tout ca la pk je fais de le merde bon aller a plus bon courage a vous. le MDP ou le login est faut ! on vous aime comme vous etes."');
    }


}else{
    //texte
    ErreurMSG('apprends a ecrir ton mdp ou ton login fdp !  on vous aime comme vous etes. <3');
}
?>
