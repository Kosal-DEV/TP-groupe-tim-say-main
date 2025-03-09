<?php
session_start();
$title = "Accueil";
$nav = "index";
$erreur = null;
require "header.php";

$cities = $pdo->prepare('SELECT id_city, city_name, city_country, city_nationality FROM cities');
$cities->execute();
$table = $cities->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./asset/css/index.css">
</head>

<body>
        <?php if (isset($_SESSION['pseudo2'])): ?>
                <h1 class="title">Content de te revoir <strong style="color: #007bff "><?php echo $_SESSION['pseudo2']; ?></strong> !</h1>
        <?php else: ?>
                <h1 class="title">Bienvenue sur notre <strong style="color: #007bff ">site</strong> !</h1>
        <?php endif; ?>
        <iframe loading="lazy" width="840" height="472.5" src="https://www.youtube.com/embed/cWoq5znh0vw?si=MA8IkgoSgj8MJCws" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>


        <div class="table__container">
                <h2>Nos pays en base de données</h2>
                <table class="table_cities" border="1">
                        <tr>
                                <th>#</th>
                                <th>Pays</th>
                                <th>Ville</th>
                                <th>Nationalité</th>
                        </tr>
                        <?php foreach ($table as $index => $row) { ?>
                                <tr>
                                        <td><?php echo $row['id_city']; ?></td>
                                        <td><?php echo $row['city_country']; ?></td>
                                        <td><?php echo $row['city_name']; ?></td>
                                        <td><?php echo $row['city_nationality']; ?></td>
                                </tr>
                        <?php } ?>
                </table>
        </div>
        
</body>

</html>
<?php require "footer.php"; ?>