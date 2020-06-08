<?php
session_start();

include "../lib/lib.php";

$i = 0;

//variable versification
$allIsFine = true;

if (empty($_POST['LOGIN-MAIL'])){
    $allIsFine = false;
}

if (empty($_POST['LOGIN-MDP']) || $_POST['LOGIN-MDP'] == ""){
    $allIsFine = false;
}

//get info
if ($allIsFine === true) {
  $login = $_POST['LOGIN-MAIL'];
  $password = $_POST['LOGIN-MDP'];
  $connection = Connect();
  $sql = "SELECT * FROM comptes WHERE email = '".$login."' AND  mdp = '".$password."';";
  $result = execQuery($connection, $sql);

  $user_exists = $result->rowCount();

  if ($user_exists === 1) {
    //set variable
    foreach ($result as $row) {
      $id = $row["id_compte"];
      $mail = $row["email"];
      $nom = $row["nom"];
      $prenom = $row["prenom"];
      $actif = $row["actif"];
      $malvoyant = $row["malvoyant"];
      $id_langues = $row["id_langues"];
      $id_equipes = $row["id_equipes"];
      $id_statuts = $row["id_statuts"];
    }
    if ($row['actif'] === 1) {
      $sql = "SELECT * FROM langues WHERE id_langues = '".$id_langues."';";
      $result = execQuery($connection, $sql);
      foreach($result as $row){
        $id_langues = $row["nom"];
      }

      $sql = "SELECT * FROM statuts WHERE id_statuts = '".$id_statuts."';";
      $result = execQuery($connection,$sql);
      foreach($result as $row){
        $id_statuts = $row["nom"];
      }

      if ($id_langues == "Français") {
        echo "Connexion validée";
      } elseif ($id_langues == "English") {
        echo "Connection approved";
      }


      $_SESSION["id"] = $id;
      $_SESSION["mail"] = $mail;
      $_SESSION["nom"] = $nom;
      $_SESSION["prenom"] = $prenom;
      $_SESSION["statuts"] = $id_statuts;
      $_SESSION["langues"] = $id_langues;
      $_SESSION["equipe"] = $id_equipes;
      $_SESSION["malvoyant"] = $malvoyant;
      header('Location: ../vue/index.php');
      exit();

    } else {
      if ($_SESSION["langues"] == 'Français') {
        ErreurMSG('Votre compte est désactivé. Contactez un administrateur pour l\'activer');
      } elseif ($_SESSION["langues"] == 'English') {
        ErreurMSG('Your account is deactivated. Contact an administrator to activate it');
      }
    }

  } else {
    if ($_SESSION["langues"] == "Français") {
      ErreurMSG('L\'adresse mail et/ou le mot de passe est incorrect. Veuillez recommencer');
    } elseif ($_SESSION["langues"] == "English") {
      ErreurMSG('There is a mistake in the email and/or the password. Please try again');
    }
  }

} else {
  if ($_SESSION["langues"] == "Français") {
    ErreurMSG('Veuillez remplir tous les champs');
  } elseif ($_SESSION["langues"] == "English") {
    ErreurMSG('Please complete all the fields');
  }
}
?>
