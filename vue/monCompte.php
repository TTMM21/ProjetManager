<?php
//This page permits to see the user information

//Files used in this page
include "../lib/NavBar.php";
include "../lib/lib.php";
require '../vendor/autoload.php';
require '../lib/lists/getInfoUser.php';

//Objets needed
use \App\User;
use \App\Users;

$pdo = Connect(); //Connection to the database
$users = new Users($pdo);

//Permits to know if there is a user with the given id
try {
    $user = $users->findUser($_SESSION['id'] ?? null);
} catch (\Exception $e) {
    e404();
}

//Save all the datas in an array
$data=[
    'nom' => $user->getLastNameUser(),
    'prenom' => $user->getFirstNameUser(),
    'email' => $user->getEmailUser(),
    'malvoyant' => $user->getVisionUser(),
    'id_statuts' => $user->getStatusUser(),
    'id_langues' => $user->getLanguageUser()
];

if ($_SESSION['langues'] == "Français") {
  render('header', ['title' => 'Concept&Co | Mon profil']);
} else {
  render('header', ['title' => 'Concept&Co | My profile']);
}
?>
<!--Button which links to the page modifProfil.php-->
<button type="button" class="btn btn-dark" onclick="location.href='modifProfil.php?id_compte=<?= $_SESSION['id'] ?>'" title="Modifier les informations" style="float: right; margin-right: 30px">
    <?php if ($_SESSION['langues'] == 'Français'): ?>
      Modifier
    <?php endif; ?>
    <?php if ($_SESSION['langues'] == 'English'): ?>
      Modify
    <?php endif; ?>
</button>

<!--Button which links to the page accountDeactivation.php-->
<button type="button" class="btn btn-dark" onclick="location.href='../controle/accountDeactivation.php?id_compte=<?= $_SESSION['id'] ?>'" title="Modifier les informations" style="float: right; margin-right: 30px">
    <?php if ($_SESSION['langues'] == 'Français'): ?>
      Désactiver le compte
    <?php endif; ?>
    <?php if ($_SESSION['langues'] == 'English'): ?>
      Deactivate the account
    <?php endif; ?>
</button>

<div class="container" style="margin: 10% auto auto auto;">
    <div class="card" style="background-color:rgba(0, 0, 20, 0.5);">
        <div class="card-header" style="color: white;">
          <?php if ($_SESSION["langues"] == "Français"): ?>
            <h3>Mon profil</h3>
          <?php endif; ?>
          <?php if ($_SESSION["langues"] == "English"): ?>
            <h3>My profile</h3>
          <?php endif; ?>
        </div>

        <!-- Display user information -->
        <div class="card-body">
            <div style="margin: auto 10% auto 10%;">
                <ul class="list-group list-group-flush" style="border-radius: 10px;">
                  <?php if ($_SESSION["langues"] == "Français"): ?>
                    <li class="list-group-item">Adresse mail : <?= $data["email"] ?></li>
                    <li class="list-group-item">Prénom : <?= $data["prenom"] ?></li>
                    <li class="list-group-item">Nom : <?= $data["nom"]  ?></li>
                    <li class="list-group-item">Type de compte : <?= getStatusName($data["id_statuts"])  ?></li>
                    <li class="list-group-item">Langue : <?= getLanguageName($data["id_langues"])  ?></li>
                  <?php endif; ?>

                  <?php if (getLanguageName($data["id_langues"]) == "English"): ?>
                    <li class="list-group-item">Email: <?= $data["email"] ?></li>
                    <li class="list-group-item">First Name: <?= $data["prenom"] ?></li>
                    <li class="list-group-item">Last Name: <?= $data["nom"] ?></li>
                    <li class="list-group-item">Account's status:
                      <?php
                        if (getStatusName($data["id_statuts"]) == "Administrateur") {
                          echo "Administrator";
                      } elseif (getStatusName($data["id_statuts"]) == "Utilisateur") {
                          echo "User";
                        } else {
                          echo "Customer";
                        }
                      ?>
                    </li>
                    <li class="list-group-item">Language: <?= getLanguageName($data["id_langues"]) ?></li>
                  <?php endif; ?>



                  <?php if($data["malvoyant"] == 1 && getLanguageName($data["id_langues"]) == "Français"): ?>
                      <li class="list-group-item">Spécificité du compte : adapté aux personnes malvoyantes</li>
                  <?php endif; ?>

                  <?php if($data["malvoyant"] == 1 && getLanguageName($data["id_langues"]) == "English"): ?>
                      <li class="list-group-item">Account's specific feature: appropriate for visually impaired person</li>
                  <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php render('footer') ?>
