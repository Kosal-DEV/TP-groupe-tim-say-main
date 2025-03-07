<?php
session_start();
$title = "Profil";
$nav = "profil";
$erreur = null;
require "header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/profil.css">
</head>

<body>
    <div class="profil">
        <div class="profil__img">
            <img class="img__profil" src="./asset/img/profil.png" alt="Photo de profil">
        </div>
        <div class="profil__name">
            <h2><?php echo $_SESSION['firstname2'] . " " . $_SESSION['name2']; ?></h2>
        </div>
        <div class="separator"></div>
        <div class="profil__pseudo">
            <h3><?php echo "Pseudo : " . $_SESSION['pseudo2']; ?></h3>
        </div>
        <div class="separator"></div>
        <div class="profil__ville">
            <h3><?php
                switch ($_SESSION['city']) {
                    case "1":
                        echo "Ville : Bruxelles";
                        break;
                    case "2":
                        echo "Ville : Amsterdam";
                        break;
                    case "3":
                        echo "Ville : Tokyo";
                        break;
                    case "4":
                        echo "Ville : Arlon";
                        break;
                    case "5":
                        echo "Ville : Christchurch";
                        break;
                    case "6":
                        echo "Ville : Vientiane";
                        break;
                    case "7":
                        echo "Ville : Barcelone";
                        break;
                    case "8":
                        echo "Ville : Rome";
                        break;
                    case "9":
                        echo "Ville : Zurich";
                        break;
                    case "10":
                        echo "Ville : Berlin";
                        break;
                    case "11":
                        echo "Ville : Lisbonne";
                        break;
                    default:
                        echo "Ville : /";
                }
                ?></h3>
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