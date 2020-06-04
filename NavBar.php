<?php
  session_start();
?>
<!-- display navbar and global option -->
<meta charset="utf-8" />


<nav id="nav">
    <a href="#">
      <img id="LOGIN-LOGO" src="../lib/header.png" alt="Concept&Co">
    </a>
   
<?php
    if(isset($_SESSION["ID_STATUTS"])){
        if($_SESSION["ID_STATUTS"] >= 1){
            //text
            echo '<a class="nav-link" href="../Vue/Menu.php">Menu</a>
            <a class="nav-link" href="../Vue/Project.php">Project</a>
            <a class="nav-link" href="../Vue/Task.php">Tasks</a>
            <a class="nav-link" href="../Vue/compte.php">Mon Compte</a>
            <a class="nav-link" href="../controle/logout.php">Logout</a>';
            
        }

        if($_SESSION["ID_STATUTS"] >= 3){
            echo '<a class="nav-link" href="../Vue/Users.php">Utilisateur Projet</a>
            <a class="nav-link" href="../Vue/AccountManagment.php">Account Managment</a>';
        }
    }
            
    /** error display */
    if(isset($_SESSION["erreur"])=== false || $_SESSION["erreur"] == ""){

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


 