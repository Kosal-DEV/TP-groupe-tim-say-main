<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $title = "Profil";
    $nav = "profil";
    $erreur = null;
    require "header.php";
    ?>
    <link rel="stylesheet" href="./asset/css/profil.css">
</head>

<body>
    <div class="profil">
        <div class="profil__img">
            <img class="img__profil" src="./asset/img/profil.png" alt="Photo de profil">
        </div>
        <div class="profil__name">
            <h2>Timothy Redant</h2>
        </div>
        <div class="separator"></div>
        <div class="profil__pseudo">
            <h3>Pseudo : Kosal</h3>
        </div>
        <div class="separator"></div>
        <div class="profil__ville">
            <h3>Ville : Bruxelles</h3>
        </div>
        <div class="separator"></div>
        <div class="profil__nation">
            <h3>Nationalité : Belges</h3>
        </div>
        <form action="" method="post" class="profil__button">
            <button class="btn__profil">Modifier photo profil</button>
            <button class="btn__logout" type="submit" name="deconnexion">Deconnexion</button>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST['deconnexion'])) {
    header('Location: logout.php');
}
?>