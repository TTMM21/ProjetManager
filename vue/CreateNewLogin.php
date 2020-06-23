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

function random($nbr) {
    $chn = '';
    for ($i=1;$i<=$nbr;$i++)
        $chn .= chr(floor(rand(0, 25)+97));
        return $chn;
       }
    
//Check if there is an user with this email firstname and lastname
$login = $_POST['LOGIN-MAIL'];
echo $login;
$firstname = $_POST['LOGIN-PRENOM'];
echo $firstname;
$lastname = $_POST['LOGIN-NOM'];
echo $lastname;
$connection = Connect();
$sql = "SELECT * FROM comptes WHERE email = '".$login."' AND  nom = '".$lastname."' AND  prenom = '".$firstname."';";
$result = $connection->prepare($sql);
$rows = $result->fetchall();
foreach($rows as $row) {
    echo $row['mdp'];
}

$user_exists = 1;
if ($user_exists === 1) {
     //set variable
    $erreur = "faux";
    $rd = random(20);
    //Check if the user's account is activated
    if ($actif === 1) {
        $sql2 = "UPDATE `comptes` SET `actif`= 0, `mdp`= $rd  WHERE id_compte = $iduser";
        $result2 = $connection2->query($sql2);
    } else { //If the user's account is deactivated
        if ($langue == 'Français') {
            ErreurMSG('Votre compte est désactivé. Contactez un administrateur pour l\'activer');
        } elseif ($langue == 'English') {
            ErreurMSG('Your account is deactivated. Contact an administrator to activate it');
        }
    } 

} else { //If any user have the combinaison email and password
    $erreur = "vrai";
    if ($langue == "Français") {
        //ErreurMSG('L\'adresse mail et/ou le mot de passe est incorrect. Veuillez recommencer');
    } elseif ($langue == "English") {
        //ErreurMSG('There is a mistake in the email and/or the password. Please try again');
    }
}
    
?>

<div id="LOGIN">
<?php if ($erreur == "faux"): ?>
    <?php if ($langue == "Français"): ?>
        <h1 id="LOGIN-TEXT">Succès</h1>
    <?php endif; ?>
    <?php if ($langue == "English"): ?>
        <h1 id="LOGIN-TEXT">Success</h1>
    <?php endif; 
    echo "<p src=CreateNewPassword.php/$rd>Clique ici pour changer de mdp$rd</p>"
    ?>
<?php endif; ?>
<?php if($erreur == "vrai"): ?>
    <?php if ($langue == "Français"): ?>
        <h1 id="LOGIN-TEXT">Erreur</h1>
    <?php endif; ?>
    <?php if ($langue == "English"): ?>
        <h1 id="LOGIN-TEXT">Error</h1>
    <?php endif; ?>
<?php endif; ?>
</div>

<?php render('footer'); ?>
