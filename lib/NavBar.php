<?php
session_start();
?>
<!-- display navbar and global option -->
<meta charset="utf-8" />


<nav id="nav">
    <a href="#">
      <img id="navbar-img" src="../lib/header.png" alt="Concept&Co">
    </a>

<?php
  if(isset($_SESSION["statuts"])){
      if(($_SESSION["statuts"] == "Administrateur" || $_SESSION["statuts"] == "Client" || $_SESSION["statuts"] == "Employé") && $_SESSION["langues"] == "Français"){
          echo '<a class="nav-link" href="../vue/index.php" id="navbar-lien">Accueil</a>';
        }

      if(($_SESSION["statuts"] == "Administrateur" || $_SESSION["statuts"] == "Client" || $_SESSION["statuts"] == "Employé") && $_SESSION["langues"] == "English"){
          echo '<a class="nav-link" href="../vue/index.php" id="navbar-lien">Homepage</a>';
      }



      if($_SESSION["statuts"] == "Administrateur" && $_SESSION["langues"] == "Français"){
        echo '<a class="nav-link" href="../vue/addProject.php" id="navbar-lien">Ajouter un projet</a>
        <a class="nav-link" href="../vue/projectsFinished.php" id="navbar-lien">Historique des projets</a>
        <a class="nav-link" href="../vue/tasksFinished.php" id="navbar-lien">Historique des tâches</a>
        <a class="nav-link" href="../vue/TeamManagement.php" id="navbar-lien">Gestion des équipes</a>
        <a class="nav-link" href="../vue/AccountManagement.php" id="navbar-lien">Gestion des utilisateurs</a>';
      }

      if($_SESSION["statuts"] == "Administrateur" && $_SESSION["langues"] == "English"){
        echo '<a class="nav-link" href="../vue/addProject.php" id="navbar-lien">Add a project</a>
        <a class="nav-link" href="../vue/projectsFinished.php" id="navbar-lien">Projects\' archive</a>
        <a class="nav-link" href="../vue/tasksFinished.php" id="navbar-lien">Tasks\' archive</a>
        <a class="nav-link" href="../vue/TeamManagement.php" id="navbar-lien">Teams\' management</a>
        <a class="nav-link" href="../vue/AccountManagement.php" id="navbar-lien">Accounts\' management</a>';
      }



      if(($_SESSION["statuts"] == "Administrateur" || $_SESSION["statuts"] == "Client" || $_SESSION["statuts"] == "Employé") && $_SESSION["langues"] == "Français"){
        echo '<a class="nav-link" href="../vue/monCompte.php" id="navbar-lien">Mon Compte</a>
        <a class="nav-link" href="../controle/logout.php" id="navbar-lien">Déconnexion</a>';
      }

      if(($_SESSION["statuts"] == "Administrateur" || $_SESSION["statuts"] == "Client" || $_SESSION["statuts"] == "Employé") && $_SESSION["langues"] == "English"){
        echo '<a class="nav-link" href="../vue/monCompte.php" id="navbar-lien">My account</a>
        <a class="nav-link" href="../controle/logout.php" id="navbar-lien">Logout</a>';
      }
  }

  /** connection verification **/
  if((isset($_SESSION["mail"])==false) && ($URL == "login")){
      header('Location: ../vue/login.php');
      exit();
  }
?>
</nav>
</br>
<?php
/** error display */
  if(isset($_SESSION["erreur"]) === false || $_SESSION["erreur"] == ""){

  }else{
      echo $_SESSION["erreur"];
      $_SESSION["erreur"]='';
  }
?>
