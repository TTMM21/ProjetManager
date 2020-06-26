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
  <form method="POST" action="../Controle/mdp.php?id=<?php echo $_GET['id']?>">
    <?php if ($langue == "Français"): ?>
      <label id="LOGIN-LABEL" name="LOGIN-LABEL-MAIL" >Mot de passe : </label>
      <input type="password" id="LOGIN-MDP" minlength="8" name="LOGIN-MDP" placeholder="Mot de passe" required="required" />
    <?php endif; ?>
    <?php if ($langue == "English"): ?>
      <label id="LOGIN-LABEL" name="LOGIN-LABEL-MAIL" >Password : </label>
      <input type="password" id="LOGIN-MDP" minlength="8" name="LOGIN-MDP" placeholder="Password" required="required" />
    <?php endif; ?>
    

    <br id="login-br"/>
    <?php if ($langue == "Français"): ?>
      <label id="LOGIN-LABEL" name="LOGIN-LABEL-MDP" >Confirmer mot de passe : </label>
      <input type="password" id="LOGIN-MDPCONFIRM" minlength="8" name="LOGIN-MDPCONFIRM" placeholder="Confirmer mot de passe" required="required" />
    <?php endif; ?>
    <?php if ($langue == "English"): ?>
      <label id="LOGIN-LABEL" name="LOGIN-LABEL-MDP" >Confirm password : </label>
      <input type="password" id="LOGIN-MDPCONFIRM" minlength="8" name="LOGIN-MDPCONFIRM" placeholder="Confirm password" required="required" />
    <?php endif; ?>
    
      <br id="login-br"/>
      <input type="submit" value="Changer le mdp">
  </form>
</div>

<?php render('footer') ?>
