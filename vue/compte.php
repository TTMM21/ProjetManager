<?php
include "../lib/NavBar.php";
include "../lib/lib.php";

if ($_SESSION['langues'] == "Français") {
  render('header', ['title' => 'Concept&Co | Profil utilisateur']);
} else {
  render('header', ['title' => 'Concept&Co | User profile']);
}
?>

<div class="container" style="margin: 10% auto auto auto;">
    <div class="card" style="background-color:rgba(0, 0, 20, 0.5);">
        <div class="card-header" style="color: white;">
          <?php if ($_SESSION["langues"] == "Français"): ?>
            <h3>Profil utilisateur</h3>
          <?php endif; ?>
          <?php if ($_SESSION["langues"] == "English"): ?>
            <h3>User profile</h3>
          <?php endif; ?>
        </div>

        <!-- Display user information -->
        <div class="card-body">
            <div style="margin: auto 10% auto 10%;">
                <ul class="list-group list-group-flush" style="border-radius: 10px;">
                  <?php if ($_SESSION["langues"] == "Français"): ?>
                    <li class="list-group-item">Adresse mail : <?= $_SESSION["mail"] ?></li>
                    <li class="list-group-item">Prénom : <?= $_SESSION["prenom"] ?></li>
                    <li class="list-group-item">Nom : <?= $_SESSION["nom"]  ?></li>
                    <li class="list-group-item">Type de compte : <?= $_SESSION["statuts"]  ?></li>
                    <li class="list-group-item">Langue : <?= $_SESSION["langues"]  ?></li>
                  <?php endif; ?>

                  <?php if ($_SESSION["langues"] == "English"): ?>
                    <li class="list-group-item">Email: <?= $_SESSION["mail"] ?></li>
                    <li class="list-group-item">First Name: <?= $_SESSION["prenom"] ?></li>
                    <li class="list-group-item">Last Name: <?= $_SESSION["nom"] ?></li>
                    <li class="list-group-item">Account's status:
                      <?php
                        if ($_SESSION["statuts"] == "Administrateur") {
                          echo "Administrator";
                        } elseif ($_SESSION["statuts"] == "Utilisateur") {
                          echo "User";
                        } else {
                          echo "Customer";
                        }
                      ?>
                    </li>
                    <li class="list-group-item">Language: <?= $_SESSION["langues"] ?></li>
                  <?php endif; ?>



                  <?php if($_SESSION["malvoyant"] == 1 && $_SESSION["langues"] == "Français"): ?>
                      <li class="list-group-item">Spécificité du compte : adapté aux personnes malvoyantes</li>
                  <?php endif; ?>

                  <?php if($_SESSION["malvoyant"] == 1 && $_SESSION["langues"] == "English"): ?>
                      <li class="list-group-item">Account's specific feature: appropriate for visually impaired person</li>
                  <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php render('footer') ?>
