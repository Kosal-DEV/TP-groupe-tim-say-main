<?php
$title = "Login";
$nav = "login";
$erreur = null;
require "header.php";

//Enregistrer un utilisateur dans la base de données
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['form_type']) && $_POST['form_type'] === 'register') {
            $stmtAddUser = 'INSERT INTO users(user_name,user_firstname,user_nickname,user_password,user_date_of_birth,id_city) 
        VALUES (:name, :firstname, :nickname, :password, :dob, :city)';
            $addUser = $pdo->prepare($stmtAddUser);
    
            $stmtIdCity = 'SELECT id_city FROM cities WHERE city_name = :city';
            $idcity = $pdo->prepare($stmtIdCity);
            $idcity->execute(['city' => $_POST['ville']]);
            $city = $idcity->fetchAll();
    
            $addUser->execute([
                'name' => $_POST['name'],
                'firstname' => $_POST['firstname'],
                'nickname' => $_POST['pseudo'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'dob' => $_POST['dob'],
                'city' => $city[0]['id_city']
            ]);
            echo "Inscription réussi !";
        }
    }
  } catch (PDOException $error){
    echo $error->getMessage();
}

//-----------------------------------------------------------------------------------------------------------------------------------
//         CONNEXION
//-----------------------------------------------------------------------------------------------------------------------------------

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['form_type']) && $_POST['form_type'] === 'login') {
        $pseudo2 = $_POST['pseudo2'];
        $password2 = $_POST['password2'];

        $query = $pdo->prepare("SELECT * FROM users WHERE user_nickname = :pseudo2");
        $query->execute(['pseudo2' => $pseudo2]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password2, $user['user_password'])) {
                $_SESSION['connected'] = true;
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['pseudo2'] = $user['user_nickname'];
                if (isset($_SESSION['connected']) && $_SESSION['connected']) {
                    header("Location: profil.php");
                }
                exit();
            } else {
                echo "Identifiant incorrect !";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/login.css">
    <title>Login</title>
</head>

<body>
    <form id="connection" class="form" method="post">
        <input type="hidden" name="form_type" value="login">
        <div class="form__title">
            <h2>Se connecter</h2>
        </div>



        <div class="form__input">
            <input class="input" type="text" name="pseudo2" placeholder="Pseudo" required><br>
            <input class="input" type="password" name="password2" placeholder="Mot de passe" required>
        </div>

        <div class="form__info">
            <div>
                <input type="checkbox" name="remember">
                <label>Se souvenir de moi</label>
            </div>
            <a href="#">Mot de passe oublié</a>
        </div>

        <div class="form__submit">
            <input class="btn" type="submit" value="Connexion">
        </div>

        <div class="form__inscription">
            <p id="inscription2" class="inscription">Pas encore inscrit ? <a onclick="changeForm('inscription')" href="#">Inscris-toi maintenant !</a></p>
        </div>
    </form>
    <!-- ------------------------------------------------------------------------------------------------------------------------ -->
    <!-- INSCRIPTION -->
    <!-- ------------------------------------------------------------------------------------------------------------------------ -->
    <form id="inscription" class="form hidden" method="post">
        <input type="hidden" name="form_type" value="register">
        <div class="form__title">
            <h2>Inscription</h2>
        </div>



        <div class="form__input">
            <input class="input" type="text" name="pseudo" placeholder="Pseudo" required>
            <input class="input" type="text" name="name" placeholder="Nom" required>
            <input class="input" type="text" name="firstname" placeholder="Prénom" required>
            <label for="">Date de naissance : </label>
            <input type="date" name="dob" id="dob">
            <input class="input" type="password" name="password" placeholder="Mot de passe" required>
            <label for="ville">Votre ville : </label>
            <select name="ville" id="ville">
                <?php
                $stmtCities = 'SELECT city_name FROM cities';
                $cities = $pdo->prepare($stmtCities);
                $cities->execute();
                $listCities = $cities->fetchAll();


                for ($i = 0; $i < sizeof($listCities); $i++) {
                ?><option value="<?php echo $listCities[$i]['city_name'] ?>"><?php
                                                                                echo $listCities[$i]['city_name'];
                                                                                ?></option><?php
                                                                                        };

                                                                                            ?>
            </select>
        </div>

        <div class="form__info">
            <div>
                <input type="checkbox" name="remember">
                <label>Se souvenir de moi</label>
            </div>
        </div>

        <div class="form__submit">
            <input class="btn" type="submit" value="Inscription">
        </div>

        <div class="form__inscription">
            <p class="inscription">Déjà inscrit ? <a onclick="changeForm('connection')" href="#">Connecte-toi maintenant !</a></p>
        </div>
    </form>
    <?php require "footer.php"; ?>
    <script src="./login.js"></script>
</body>

</html>