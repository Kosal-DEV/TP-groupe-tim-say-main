<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        <?php
        echo isset($title) ? $title : "Mon Site BG";
        require_once "./asset/authentification/authentification.php";
        ?>
    </title>
    <link rel="stylesheet" href="./asset/css/header.css">
</head>

<body>
    <header>
        <h1>&#60;&#47;Vizion&#62;</h1>
        <nav>
            <ul class="navbar">
            <?php
                if (!function_exists('activeClass')) {
                    function activeClass($page, $nav)
                    {
                        return ($nav === $page) ? 'class="btn2"' : 'class="btn1"';
                    }
                }
                ?>
                <li>
                    <a href="index.php" <?= activeClass("index", $nav ?? "") ?>>Accueil</a>
                </li>
                <?php if (is_connected()): ?>
                    <li>
                        <a href="profil.php" <?= activeClass("profil", $nav ?? "") ?>>Profil</a>
                    </li>
                    <li>
                        <a href="logout.php" <?= activeClass("logout", $nav ?? "") ?>>Déconnexion</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="login.php" <?= activeClass("login", $nav ?? "") ?>>Connexion</a>
                    </li>
                <?php endif; ?>
            </ul>

        </nav>
    </header>
<?php
require 'connectDB.php';
?>