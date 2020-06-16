<?php
session_start();
?>
<!-- display navbar and global options -->
<nav id="nav">
    <a href="#">
      <img id="LOGIN-LOGO" src="../lib/header.png" alt="Concept&Co">
    </a>

<?php
  if(isset($_SESSION["statuts"])){
      if(($_SESSION["statuts"] == "Administrateur" || $_SESSION["statuts"] == "Client" || $_SESSION["statuts"] == "Employé") && $_SESSION["langues"] == "Français"){
          echo '<a class="nav-link" href="../vue/index.php">Accueil</a>';
        }

      if(($_SESSION["statuts"] == "Administrateur" || $_SESSION["statuts"] == "Client" || $_SESSION["statuts"] == "Employé") && $_SESSION["langues"] == "English"){
          echo '<a class="nav-link" href="../vue/Menu.php">Homepage</a>';
      }



      if($_SESSION["statuts"] == "Administrateur" && $_SESSION["langues"] == "Français"){
        echo '<a class="nav-link" href="../vue/addProject.php">Ajouter un projet</a>
        <a class="nav-link" href="../vue/projectsFinished.php">Historique des projets</a>
        <a class="nav-link" href="../vue/tasksFinished.php">Historique des tâches</a>
        <a class="nav-link" href="../vue/TeamManagement.php">Gestion des équipes</a>
        <a class="nav-link" href="../vue/AccountManagement.php">Gestion des utilisateurs</a>';
      }

      if($_SESSION["statuts"] == "Administrateur" && $_SESSION["langues"] == "English"){
          echo '<a class="nav-link" href="../vue/addProject.php">Add a new project</a>
          <a class="nav-link" href="../vue/projectsFinished.php">Projects\' archive</a>
          <a class="nav-link" href="../vue/tasksFinished.php">Tasks\' archive</a>
          <a class="nav-link" href="../vue/TeamManagement.php">Teams\' management</a>
          <a class="nav-link" href="../vue/AccountsManagement.php">Accounts\' management</a>';
      }



      if(($_SESSION["statuts"] == "Administrateur" || $_SESSION["statuts"] == "Client" || $_SESSION["statuts"] == "Employé") && $_SESSION["langues"] == "Français"){
        echo '<a class="nav-link" href="../vue/compte.php">Mon Compte</a>
        <a class="nav-link" href="../controle/logout.php">Déconnexion</a>';
      }

      if(($_SESSION["statuts"] == "Administrateur" || $_SESSION["statuts"] == "Client" || $_SESSION["statuts"] == "Employé") && $_SESSION["langues"] == "English"){
        echo '<a class="nav-link" href="../vue/compte.php">My account</a>
        <a class="nav-link" href="../controle/logout.php">Logout</a>';
      }
  }

  /** error display */
  if(isset($_SESSION["erreur"]) === false || $_SESSION["erreur"] == ""){

  }else{
      echo $_SESSION["erreur"];
      $_SESSION["erreur"]='';
  }

  /** connection verification **/
  if((isset($_SESSION["mail"])==false) && ($URL == "login")){
      header('Location: ../vue/login.php');
      exit();
  }
?>
</nav>
</br>
