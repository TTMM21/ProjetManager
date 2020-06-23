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
  <br id="login-br-2"/>
  <form method="POST" action="../Controle/Login.php">
    <?php if ($langue == "Français"): ?>
      <label id="LOGIN-LABEL" name="LOGIN-LABEL-MAIL" >Adresse mail : </label>
      <input type="mail" id="LOGIN-MAIL" name="LOGIN-MAIL" placeholder="Adresse mail" required="required" />
    <?php endif; ?>
    <?php if ($langue == "English"): ?>
      <label id="LOGIN-LABEL" name="LOGIN-LABEL-MAIL" >Email: </label>
      <input type="mail" id="LOGIN-MAIL" name="LOGIN-MAIL" placeholder="E-mail" required="required" />
    <?php endif; ?>
    

    <br id="login-br"/>
    <?php if ($langue == "Français"): ?>
      <label id="LOGIN-LABEL" name="LOGIN-LABEL-MDP" >Mot de passe : </label>
      <input type="password" id="LOGIN-MDP" minlength="8" name="LOGIN-MDP" placeholder="Mots de passe" required="required" />
    <?php endif; ?>
    <?php if ($langue == "English"): ?>
      <label id="LOGIN-LABEL" name="LOGIN-LABEL-MDP" >Password: </label>
      <input type="password" id="LOGIN-MDP" minlength="8" name="LOGIN-MDP" placeholder="password" required="required" />
    <?php endif; ?>
    
    <br id="login-br"/>
    <?php if ($langue == "Français"): ?>
      <a href="../vue/SetLogin.php" id="login-lien">Mot de passe oublié ?</a>
      <br id="login-br"/>
      <input type="submit" value="Se connecter">
    <?php endif; ?>
    <?php if ($langue == "English"): ?>
      <a href="../vue/SetLogin.php" id="login-lien">Forgotten password ?</a>
      <br id="login-br"/>
      <input type="submit" value="Login">
    <?php endif; ?>
  </form>
</div>

<?php render('footer') ?>
