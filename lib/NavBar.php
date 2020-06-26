<?php
session_start();
?>
<!-- display navbar and global option -->
<meta charset="utf-8" />

<?php
if (isset($_SESSION['malvoyant'])) {
  $nav = "id ='nav-pleine'";
  if ($_SESSION['malvoyant'] == "1") {
    $malvoyant = "id ='navbar-lien-malvoyant'";

  }else{
    $malvoyant = "id ='navbar-lien'";
  }
  if ($_SESSION['malvoyant'] == "1") {
    $malvoyant2 = "id ='navbar-lien-malvoyant-2'";

  }else{
    $malvoyant2 = "id ='navbar-lien-2'";
  }
}else{
  $nav = "id ='nav-vide'";
}
if ($_SESSION['mobile'] = 0){
    $_SESSION['mobile'] = 1;
}else{
    $_SESSION['mobile'] = 0; 
}?>

<nav <?php echo $nav;?>>
    <a href="#">
      <img id="navbar-img" src="../lib/header.png" alt="Concept&Co">
    </a>
<?php
  if(isset($_SESSION["statuts"])){
    if ($_SESSION["mobile"] == "1"){

    }else{
        if(($_SESSION["statuts"] == "Administrateur" || $_SESSION["statuts"] == "Client" || $_SESSION["statuts"] == "Employé") && $_SESSION["langues"] == "Français"){
            echo '<a class="nav-link" href="../vue/index.php" '.$malvoyant.'>Accueil</a>';
          }

        if(($_SESSION["statuts"] == "Administrateur" || $_SESSION["statuts"] == "Client" || $_SESSION["statuts"] == "Employé") && $_SESSION["langues"] == "English"){
            echo '<a class="nav-link" href="../vue/Menu.php" '.$malvoyant.'>Homepage</a>';
        }



        if($_SESSION["statuts"] == "Administrateur" && $_SESSION["langues"] == "Français"){
          echo '<a class="nav-link" href="../vue/addProject.php" '.$malvoyant.'>Ajouter un projet</a>
          <a class="nav-link" href="../vue/projectsFinished.php" '.$malvoyant.'>Historique des projets</a>
          <a class="nav-link" href="../vue/tasksFinished.php" '.$malvoyant.'>Historique des tâches</a>
          <a class="nav-link" href="../vue/TeamManagement.php" '.$malvoyant.'>Gestion des équipes</a>
          <a class="nav-link" href="../vue/AccountManagement.php" '.$malvoyant.'>Gestion des utilisateurs</a>';
        }

        if($_SESSION["statuts"] == "Administrateur" && $_SESSION["langues"] == "English"){
            echo '<a class="nav-link" href="../vue/addProject.php" '.$malvoyant.'>Projects\' add</a>
            <a class="nav-link" href="../vue/projectsFinished.php" '.$malvoyant.'>Projects\' archive</a>
            <a class="nav-link" href="../vue/tasksFinished.php" '.$malvoyant.'>Tasks\' archive</a>
            <a class="nav-link" href="../vue/TeamManagement.php" '.$malvoyant.'>Teams\' management</a>
            <a class="nav-link" href="../vue/AccountsManagement.php" '.$malvoyant.'>Accounts\' management</a>';
        }

        if(($_SESSION["statuts"] == "Administrateur" || $_SESSION["statuts"] == "Client" || $_SESSION["statuts"] == "Employé") && $_SESSION["langues"] == "Français"){
          echo '<a class="nav-link" href="../vue/moncompte.php" '.$malvoyant.'>Mon Compte</a>
          <a class="nav-link" href="../controle/logout.php" '.$malvoyant.'>Déconnexion</a>
          ';
        }

        if(($_SESSION["statuts"] == "Administrateur" || $_SESSION["statuts"] == "Client" || $_SESSION["statuts"] == "Employé") && $_SESSION["langues"] == "English"){
          echo '<a class="nav-link" href="../vue/moncompte.php" '.$malvoyant.'>My account</a>
          <a class="nav-link" href="../controle/logout.php" '.$malvoyant.'>Logout</a>';
        }
        if ($_SESSION['langues'] == "Français") {
          echo "<td><a class='nav-link' ".$malvoyant2." href='../controle/English.php' title=''>Anglais</a></td>";
        } else {
          echo "<td><a class='nav-link' ".$malvoyant2." href='../controle/French.php' title=''>Francais</a></td>";
        }
        if ($_SESSION['langues'] == "Français") {
          if ($_SESSION['malvoyant'] == "0") {
            echo "<td><a class='nav-link' ".$malvoyant2." href='../controle/malvoyant.php' title=''>Malvoyant</a></td>";
          } else {
            echo "<td><a class='nav-link' ".$malvoyant2." href='../controle/nonmalvoyant.php' title=''>Non malvoyant</a></td>";
          }
        } else {
          if ($_SESSION['malvoyant'] == "0") {
            echo "<td><a class='nav-link' ".$malvoyant2." href='../controle/malvoyant.php' title=''>Visually impaired</a></td>";
          } else {
            echo "<td><a class='nav-link' ".$malvoyant2." href='../controle/nonmalvoyant.php' title=''>No visually impaired</a></td>";
          }
        }
      }
  }else{
  }
?>
</nav>
</br>

<?php
  /* error display */
  if(isset($_SESSION["erreur"]) === false || $_SESSION["erreur"] == ""){

  }else{
      echo $_SESSION["erreur"];
      $_SESSION["erreur"]='';
  }

?>