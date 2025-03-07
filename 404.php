<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur 404 - Oups !</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        h1 {
            font-size: 100px;
            margin: 0;
            animation: shake 1s infinite;
        }
        p {
            font-size: 20px;
        }
        .fun-text {
            font-size: 18px;
            margin-top: 20px;
            color: #666;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 18px;
            color: white;
            background-color: #ff6347;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        a:hover {
            background-color: #d9534f;
        }
        @keyframes shake {
            0% { transform: rotate(0deg); }
            25% { transform: rotate(-3deg); }
            50% { transform: rotate(3deg); }
            75% { transform: rotate(-3deg); }
            100% { transform: rotate(0deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <p>Oups ! La page que vous cherchez a disparu comme un ninja 🥷💨</p>
        <p class="fun-text">Peut-être qu'elle est en train de se recompiler... ou qu'un développeur l'a supprimée "par accident" 🤔💻</p>
        <p class="fun-text">Essayez de vider le cache, d'actualiser... ou de pleurer un peu 😭</p>
        <p class="fun-text">Si vous voyez un bug, c'est une fonctionnalité non documentée. 😉</p>
        <a href="./login.php">Retour à l'accueil</a>
    </div>
</body>
</html>
