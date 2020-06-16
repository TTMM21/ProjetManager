<?php
$URL = 'Login';
$langue = "Français";

include "../lib/NavBar.php";
include "../lib/lib.php";

if ($langue == "Français") {
  render('header', ['title' => 'Concept&Co | Connexion']);
} else {
  render('header', ['title' => 'Concept&Co | Login']);
}
?>

<div id="LOGIN">
  <?php if ($langue == "Français"): ?>
    <h1 id="LOGIN-TEXT">Connexion</h1>
  <?php endif; ?>
  <?php if ($langue == "English"): ?>
    <h1 id="LOGIN-TEXT">Login</h1>
  <?php endif; ?>

  <hr id="LOGIN-LINE">

  <form method="POST" action="../Controle/Login.php">
    <?php if ($langue == "Français"): ?>
      <label id="LOGIN-LABEL" name="LOGIN-LABEL-MAIL" >Adresse mail : </label>
    <?php endif; ?>
    <?php if ($langue == "English"): ?>
      <label id="LOGIN-LABEL" name="LOGIN-LABEL-MAIL" >Email: </label>
    <?php endif; ?>
    <input type="mail" id="LOGIN-MAIL" name="LOGIN-MAIL" placeholder="E-mail" required="required" />


    <?php if ($langue == "Français"): ?>
      <label id="LOGIN-LABEL" name="LOGIN-LABEL-MDP" >Mot de passe : </label>
    <?php endif; ?>
    <?php if ($langue == "English"): ?>
      <label id="LOGIN-LABEL" name="LOGIN-LABEL-MDP" >Password: </label>
    <?php endif; ?>
    <input type="password" id="LOGIN-MDP" minlength="8" name="LOGIN-MDP" placeholder="password" required="required" />


    <?php if ($langue == "Français"): ?>
      <a href="../vue/SetLogin.php">Mot de passe oublié ?</a>
      <input type="submit" value="Se connecter">
    <?php endif; ?>
    <?php if ($langue == "English"): ?>
      <a href="../vue/SetLogin.php">Forgotten password ?</a>
      <input type="submit" value="Login">
    <?php endif; ?>
  </form>
</div>

<?php render('footer') ?>
