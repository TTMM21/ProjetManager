<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8" />
  <title> Formulaire </title>
  <link rel="stylesheet" type="text/css" href="../lib/styleAll.css">

</head>

<body>
<?php
$URL = 'Login';
include "../lib/NavBar.php";
?>
  <div id="LOGIN">
    <h1 id="LOGIN-TEXT">Login</h1>
    <hr id="LOGIN-LINE">

    <form method="POST" action="../Controle/Login.php">
    //texte
      <label id="LOGIN-LABEL" name="LOGIN-LABEL-MAIL" >Entez votre adresse Mail</label>
      <input type="mail" id="LOGIN-MAIL" name="LOGIN-MAIL" placeholder="E-mail" required="required" />
      
    //texte
      <label id="LOGIN-LABEL" name="LOGIN-LABEL-MDP" >Entez votre adresse Mail</label>
      <input type="password" id="LOGIN-MDP" minlength="8" name="LOGIN-MDP" placeholder="password" required="required" />

      <a href="../vue/SetLogin.php">Forgetten password ?</a>
      <input type="submit" value="Login">
    </form>
  </div>
</body>

</html>