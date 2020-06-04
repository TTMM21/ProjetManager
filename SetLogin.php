<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8" />
  <title> Formulaire </title>
  <link rel="stylesheet" type="text/css" href="../lib/styleAll.css">

</head>

<body>
<?php
 include "../lib/NavBar.php";
?>
  <div id="LOGIN">
    <h1 id="LOGIN-TEXT">Login</h1>
    <hr id="LOGIN-LINE">

    <form method="POST" action="..\Controle\SetLogin.php">
      <input type="mail" id="LOGIN-MAIL" name="LOGIN-MAIL" placeholder="E-mail" required="required" />

      <input type="submit" value="Login">
    </form>
  </div>
</body>

</html>