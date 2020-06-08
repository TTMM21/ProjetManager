<?php
//This page shows an user's profil

//Files used in this page
include "../lib/NavBar.php";
include "../lib/lib.php";
require '../vendor/autoload.php';

//Objets needed
use \App\User;
use \App\Users;

$pdo = Connect(); //Connection to the database
$users = new Users($pdo);

//Checks if there is a user with this id
try {
    $user = $users->findUser($_GET['id_compte']);
} catch (Exception $e) {
    e404();
}

//Save all the datas in an array
$data=[
    'nom' => $user->getLastNameUser(),
    'prenom' => $user->getFirstNameUser(),
    'email' => $user->getEmailUser(),
    'actif' => $user->getActivateUser(),
    'malvoyant' => $user->getVisionUser(),
    'id_statuts' => $user->getStatusUser(),
    'id_equipes' => $user->getTeamUser(),
    'id_langues' => $user->getLanguageUser()
];


//Put the correct header according to the user's language
if ($_SESSION['langues'] == "Français") {
  render('header', ['title' => 'Concept&Co | Compte']);
} else {
  render('header', ['title' => 'Concept&Co | Account']);
}
?>

<div class="container" style="margin: 10% auto auto auto;">
    <div class="card" style="background-color:rgba(0, 0, 20, 0.5);">
        <div class="card-header" style="color: white;">
          <?php if ($_SESSION["langues"] == "Français"): ?>
            <h3>Compte - <?= $data["nom"] ?> <?= $data["prenom"] ?></h3>
          <?php endif; ?>
          <?php if ($_SESSION["langues"] == "English"): ?>
            <h3>Account - <?= $data["nom"] ?> <?= $data["prenom"] ?></h3>
          <?php endif; ?>
        </div>

        <!-- Display user's information -->
        <div class="card-body">
            <div style="margin: auto 10% auto 10%;">
                <ul class="list-group list-group-flush" style="border-radius: 10px;">
                  <?php if ($_SESSION["langues"] == "Français"): ?>
                    <li class="list-group-item">Prénom : <?= $data["prenom"] ?></li>
                    <li class="list-group-item">Nom : <?= $data["nom"]  ?></li>
                    <li class="list-group-item">Adresse mail : <?= $data["email"] ?></li>
                    <li class="list-group-item">Type de compte :
                      <?php if ($data["id_statuts"] === 1): ?>
                        Client
                      <?php endif; ?>
                      <?php if ($data["id_statuts"] === 2): ?>
                        Utilisateur
                      <?php endif; ?>
                      <?php if ($data["id_statuts"] === 3): ?>
                        Administrateur
                      <?php endif; ?>
                    </li>
                    <li class="list-group-item">Langue :
                      <?php if ($data["id_langues"] === 1): ?>
                        Français
                      <?php endif; ?>
                      <?php if ($data["id_langues"] === 2): ?>
                        Anglais
                      <?php endif; ?>
                    </li>
                  <?php endif; ?>

                  <?php if ($_SESSION["langues"] == "English"): ?>
                    <li class="list-group-item">First Name: <?= $data["prenom"] ?></li>
                    <li class="list-group-item">Last Name: <?= $data["nom"] ?></li>
                    <li class="list-group-item">Email: <?= $data["email"] ?></li>
                    <li class="list-group-item">Account's status:
                      <?php if ($data["id_statuts"] === 1): ?>
                        Customer
                      <?php endif; ?>
                      <?php if ($data["id_statuts"] === 2): ?>
                        User
                      <?php endif; ?>
                      <?php if ($data["id_statuts"] === 3): ?>
                        Administrator
                      <?php endif; ?>
                    </li>
                    <li class="list-group-item">Language:
                      <?php if ($data["id_langues"] === 1): ?>
                        French
                      <?php endif; ?>
                      <?php if ($data["id_langues"] === 2): ?>
                        English
                      <?php endif; ?>
                    </li>
                  <?php endif; ?>



                  <?php if($data["malvoyant"] == 1 && $_SESSION["langues"] == "Français"): ?>
                      <li class="list-group-item">Spécificité du compte : adapté aux personnes malvoyantes</li>
                  <?php endif; ?>

                  <?php if($data["malvoyant"] == 1 && $_SESSION["langues"] == "English"): ?>
                      <li class="list-group-item">Account's specific feature: appropriate for visually impaired person</li>
                  <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php render('footer') ?>
