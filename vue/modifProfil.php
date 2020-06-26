<?php
//This page permits to modify a user

//Files used in this page
include '../lib/lib.php';
include "../lib/NavBar.php";
require '../vendor/autoload.php';
require '../controle/lists/getTeamsListCtrl.php';
require '../controle/lists/getStatusListCtrl.php';

//Objets needed
use \App\User;
use \App\Users;

$pdo = Connect(); //Connection to the database
$users = new Users($pdo);

//Permits to know if there is a user with the given id
try {
    $user = $users->findUser($_GET['id_compte'] ?? null);
} catch (\Exception $e) {
    e404();
}

//Save all the datas in an array
$data=[
    'nom' => $user->getLastNameUser(),
    'prenom' => $user->getFirstNameUser(),
    'email' => $user->getEmailUser(),
    'mdp' => $user->getPasswordUser(),
    'id_statuts' => $user->getStatusUser(),
    'id_equipes' => $user->getTeamUser()
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['mdp'] === $_POST['mdp2']) {
        $_POST['actif'] = $user->getActivateUser();
        $_POST['malvoyant'] = $user->getVisionUser();
        $_POST['id_langues'] = $user->getLanguageUser();
        $data = $_POST;

        $users->hydrateUser($user, $data);
        $users->updateUser($user);
        header("Location: monCompte.php?modify=1&id_compte=".$_SESSION['id']);
        exit();
    }
}


render('header', ['title' => 'Concept&Co | Modification d\'un compte']); //Gives the header
?>
<!--Informations about the task-->
<div class="container" style="margin: 10% auto auto auto">
    <div class="card" style="background-color: rgba(0, 0, 20, 0.5)">
        <div class="card-header" style="color: white;">
            <h3>
                <?php if ($_SESSION['langues'] == 'Français'): ?>
                    Modifier le compte
                <?php endif; ?>
                <?php if ($_SESSION['langues'] == 'English'): ?>
                    Modify the user
                <?php endif; ?>
            </h3>
        </div>
        <div class="card-body">
            <div style="margin: auto 10% auto 10%;">
                <!--Form to add a new user-->
                <form action="" method="post">
                    <?php if ($_SESSION['langues'] == 'Français'): ?>
                        <div class="form-group">
                            <label for="nom" style="color: white"><b>Nom *</b></label>
                            <input type="text" name="nom" class="form-control" required value="<?= $data['nom'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="prenom" style="color: white"><b>Prénom *</b></label>
                            <input type="text" name="prenom" class="form-control" required value="<?= $data['prenom'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" style="color: white"><b>Email *</b></label>
                            <input type="email" name="email" class="form-control" required value="<?= $data['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="mdp" style="color: white"><b>Mot de passe *</b></label>
                            <input type="password" name="mdp" class="form-control" required value="<?= $data['mdp'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="mdp2" style="color: white"><b>Confirmation du mot de passe *</b></label>
                            <input type="password" name="mdp2" class="form-control" required value="<?= $data['mdp'] ?>">
                        </div>
                        <?php if ($_SESSION['statuts'] == 'Administrateur'): ?>
                            <div class="form-group">
                                <label for="id_statuts" style="color: white"><b>Statut *</b></label>
                                <?php getStatutsListCtrl($data['id_statuts']) ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="id_equipes" style="color: white"><b>Equipe en charge *</b></label>
                            <?php getTeamsNameListCtrl($data['id_equipes']) ?>
                        </div>
                        <button type="submit" class="btn btn-success"><b>VALIDER</b></button>
                    <?php endif; ?>
                    <?php if ($_SESSION['langues'] == 'English'): ?>
                        <div class="form-group">
                            <label for="nom" style="color: white"><b>Last name *</b></label>
                            <input type="text" name="nom" class="form-control" required value="<?= $data['nom'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="prenom" style="color: white"><b>First name *</b></label>
                            <input type="text" name="prenom" class="form-control" required value="<?= $data['prenom'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" style="color: white"><b>Email *</b></label>
                            <input type="email" name="email" class="form-control" required value="<?= $data['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="mdp" style="color: white"><b>Password *</b></label>
                            <input type="password" name="mdp" class="form-control" required value="<?= $data['mdp'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="mdp2" style="color: white"><b>Password confirmation *</b></label>
                            <input type="password" name="mdp2" class="form-control" required value="<?= $data['mdp'] ?>">
                        </div>
                        <?php if ($_SESSION['statuts'] == 'Administrateur'): ?>
                            <div class="form-group">
                                <label for="id_statuts" style="color: white"><b>Statut *</b></label>
                                <?php getStatutsListCtrl($data['id_statuts']) ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="id_equipes" style="color: white"><b>Equipe en charge *</b></label>
                            <?php getTeamsNameListCtrl($data['id_equipes']) ?>
                        </div>
                        <button type="submit" class="btn btn-success"><b>SUBMIT</b></button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>

<br><br>

<?php render('footer') ?>
