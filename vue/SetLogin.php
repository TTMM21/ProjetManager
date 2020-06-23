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

<div id="RECUPERATION">
  <?php if ($langue == "Français"): ?>
    <h1 id="LOGIN-TEXT">Récupération de mots de passe</h1>
  <?php endif; ?>
  <?php if ($langue == "English"): ?>
    <h1 id="LOGIN-TEXT">Password recovery</h1>
  <?php endif; ?>

  <hr id="LOGIN-LINE">
  <br id="login-br-2"/>
  <form method="POST" action="CreateNewLogin.php">
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
      <label id="LOGIN-LABEL" name="LOGIN-LABEL-PRENOM" >Prénom : </label>
      <input type="text" id="LOGIN-PRENOM" name="LOGIN-PRENOM" placeholder="Prénom" required="required" />
    <?php endif; ?>
    <?php if ($langue == "English"): ?>
      <label id="LOGIN-LABEL" name="LOGIN-LABEL-PRENOM" >First name: </label>
      <input type="text" id="LOGIN-PRENOM" name="LOGIN-PRENOM" placeholder="First name" required="required" />
    <?php endif; ?>
    
    <br id="login-br"/>
    <?php if ($langue == "Français"): ?>
      <label id="LOGIN-LABEL" name="LOGIN-LABEL-NOM" >Nom : </label>
      <input type="text" id="LOGIN-NOM" name="LOGIN-NOM" placeholder="Nom" required="required" />
    <?php endif; ?>
    <?php if ($langue == "English"): ?>
      <label id="LOGIN-LABEL" name="LOGIN-LABEL-NOM" >Last name: </label>
      <input type="text" id="LOGIN-NOM" name="LOGIN-NOM" placeholder="Last name" required="required" />
    <?php endif; ?>

    <br id="login-br"/>
    <?php if ($langue == "Français"): ?>
      <br id="login-br"/>
      <input type="submit" value="Valider">
    <?php endif; ?>
    <?php if ($langue == "English"): ?>
      <br id="login-br"/>
      <input type="submit" value="validate">
    <?php endif; ?>
  </form>
</div>

<?php render('footer') ?>
