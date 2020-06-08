<?php
//This page is were the user can logs in

$langue = "Français";

//Files used in this page
include "../lib/NavBar.php";
include '../lib/lib.php';

//Put the correct header according to the user's language
if ($_SESSION['langues'] == "Français") {
  render('header', ['title' => 'Concept&Co | Formulaire']);
} else {
  render('header', ['title' => 'Concept&Co | Form']);
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

    <!--Form-->
    <form method="POST" action="..\Controle\SetLogin.php">
      <?php if ($langue == "Français"): ?>
        <label id="LOGIN-LABEL" name="LOGIN-LABEL-MAIL" >Adresse mail : </label>
      <?php endif; ?>
      <?php if ($langue == "English"): ?>
        <label id="LOGIN-LABEL" name="LOGIN-LABEL-MAIL" >Email: </label>
      <?php endif; ?>
      <input type="mail" id="LOGIN-MAIL" name="LOGIN-MAIL" placeholder="E-mail" required="required" />


      <?php if ($langue == "Français"): ?>
        <input type="submit" value="Se connecter">
      <?php endif; ?>
      <?php if ($langue == "English"): ?>
        <input type="submit" value="Login">
      <?php endif; ?>
    </form>
  </div>
  
<?php render('footer') ?>
