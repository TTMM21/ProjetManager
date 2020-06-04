<!DOCTYPE html> 
<html lang="en">
<html>
<head>
    <title>Login</title>

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="../lib/styleAll.css">


</head>
<body>
<?php
        include "../lib/NavBar.php";
    ?>
    <div class="container" style="margin: 10% auto auto auto;">
        <div class="card" style="background-color:rgba(0, 0, 20, 0.5);">
            <div class="card-header" style="color: white;">
                <h3>My Profile</h3>
            </div>

            <!-- Display user info -->
            <div class="card-body">
                <div style="margin: auto 10% auto 10%;">
                    <ul class="list-group list-group-flush" style="border-radius: 10px;">

                    //text
                        <li class="list-group-item">E-Mail Adresse : <?php echo($_SESSION["mail"]);?></li>
                        <li class="list-group-item">First Name : <?php echo($_SESSION["Prenom"]);?></li>
                        <li class="list-group-item">last Name : <?php echo($_SESSION["Nom"]); ?></li>
                        <li class="list-group-item">Type de compte : <?php echo($_SESSION["statuts"]); ?></li>
                        <li class="list-group-item">langage : <?php echo($_SESSION["langues"]); ?></li>

                        <?php 
                        if($_SESSION["malvoyant"] == 0 ){
                            echo('<li class="list-group-item">compte malvoyant</li>');
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>