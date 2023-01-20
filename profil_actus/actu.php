<?php
require_once "../php/message.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
};
if (!isset($_SESSION["auth"])) {
    $_SESSION["flash"]["danger"] = "You don't have the access to get in this page! Please log in with your account";
    header("Location: ../otherpages/login/html/loginy.php");
    exit();
}
$bdd = new PDO("mysql:host=localhost; dbname=sb_signin", "root", "Tsizehena,223");
$user_pdp_id = $_SESSION["auth"]["id"];
$req = $bdd->prepare("SELECT * FROM user_info WHERE `user_id` = ?");
$req->execute([$user_pdp_id]);
$requ = $req->fetch();

//test si l'user a déjà modifié son profil
if ($requ > 0) {
    function select($table)
    {
        $user_pdp_id = $_SESSION["auth"]["id"];
        $bdd = new PDO("mysql:host=localhost; dbname=sb_signin", "root", "Tsizehena,223");
        $req = $bdd->prepare("SELECT $table FROM user_info WHERE `user_id` = ?");
        $req->execute([$user_pdp_id]);
        $table = $req->fetch(PDO::FETCH_ASSOC);
        $table = implode(" ", $table);
        return $table;
    }

    $fonc = "fonction";
    $fonction = select($fonc);

    $abo = "descri_user";
    $about = select($abo);

    $exp = "experience";
    $experience = select($exp);

    $educ = "education";
    $education = select($educ);

    $lang = "langage";
    $langage = select($lang);

    $skill = "skills";
    $skills = select($skill);
}

//redaction

if (isset($_POST['publier'])) {

    if (!empty($_POST['titre']) and !empty($_POST['contenu'])) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        };

        //insertion contenu et titre
        $titre = htmlspecialchars($_POST['titre']);
        $contenu = htmlspecialchars($_POST['contenu']);
        $user_id = $_SESSION["auth"]["id"];
        $insert = $bdd->prepare('INSERT INTO articles (titre, contenu, `user_id`, create_time) VALUES (?, ?, ?, NOW())');
        $insert->execute([$titre, $contenu, $user_id]);
        $message = 'Poste envoyé avec succes';
    } else {
        $message = 'Veuillez remplir tous les champs';
    }

    //insertion image

    $compte = $bdd->prepare('SELECT count(*) FROM images WHERE id >= :id');
    $compte->bindValue(':id', 1);
    $compte->execute();
    $c = $compte->fetch(PDO::FETCH_ASSOC);
    $articleId = implode(' ', $c);
    $article_id = $articleId + 1; // pour trouver l'id

    $req = $bdd->prepare("INSERT INTO sb_signin.images (nom, taille, types, bin, article_id) VALUES (?, ?, ?, ?, ?)");
    $req->execute([$_FILES["image"]["name"], $_FILES["image"]["size"], $_FILES["image"]["type"], file_get_contents($_FILES["image"]["tmp_name"]), $article_id]);

    header("Location: profile.php");
}

//barre recherche 

@$keywords = $_POST["keywords"];
@$valider = $_POST["valider"];
if (isset($valider) && !empty(trim($keywords))) {
    $words = explode(" ", trim($keywords));
    for ($i = 0; $i < count($words); $i++)
        $kw[$i] = "contenu LIKE '%" . $words[$i] . "%'";
    $bdd = new PDO("mysql:host=localhost; dbname=sb_signin", "root", "Tsizehena,223");
    $res = $bdd->prepare("SELECT * FROM articles WHERE " . implode(" OR ", $kw));
    $res->setFetchMode(PDO::FETCH_ASSOC);
    $res->execute();
    $tab = $res->fetchAll();
    if (!empty($keywords)) {
        $afficher = "oui";
    }
}

//Compter le nombre d'article

$compte = $bdd->prepare('SELECT count(*) FROM articles');
$compte->execute();
$c = $compte->fetch(PDO::FETCH_ASSOC);
$nbr_article = implode(' ', $c);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="img/S&B.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="../article/css/redac.css">
    <link rel="stylesheet" href="css/style_search.css">
    <title>Sell&Buy - Home</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>

<body>
    <nav class="navbar">
        <form action="" method="POST">
            <div class="navbar-left">
                <a href="actu.php?id=<?= $nbr_article ?>" class="logo"><img src="images/logo.png"></a>
                <div class="search-box">
                    <img src="images/display.png">
                    <input type="text" name="keywords" value="<?= $keywords ?>" maxlength="40">
                    <input type="submit" value="Search" name="valider">
                </div>
            </div>
        </form>

        <div class="navbar-center">
            <ul>
                <li><a href="actu.php?id=<?= $nbr_article ?>" id="home" class="j"><img src="images/home.png"> <span>Home</span></a></li>
                <li><a href="profile.php?id=<?= $_SESSION["auth"]["id"] ?>" class="e" id="mynetwork"><img src="images/network.png"> <span>My Network</span></a></li>
            </ul>
        </div>
        <div class="navbar-right">
            <div class="online">
                <img src="../article/export2.php?id=<?= $user_pdp_id ?>" class="nav-profile-img">
            </div>
        </div>

        <!--------------------------------- profile-drop-down-menu---------------------->
        <div class="profile-menu-wrap" id="profileMenu">
            <div id="dark-btn">
            </div>
            <div class="profile-menu">
                <div class="user-info">
                    <img src="../article/export2.php?id=<?= $user_pdp_id ?>">
                    <div>
                        <h3><?= $_SESSION['auth']['pseudo'] ?></h3> <br>
                        <a href="profile.php">See your profile</a>
                    </div>
                </div>
                <hr>
                <a href="../otherpages/login/html/logout.php" class="profile-menu-link">
                    <img src="images/logout.png">
                    <p>Logout</p>
                    <span>></span>
                </a>
            </div>
        </div>
    </nav>
    <!-----------------------NAVBAR CLOSE------------------>

    <div class="container">
        <!------------------left-sidebar--------------------->
        <div class="left-sidebar">
            <div class="sidebar-profile-box">
                <img src="images/cover-pic.png" width="100%" height="100%">
                <div class="sidebar-profile-info">
                    <img src="../article/export2.php?id=<?= $user_pdp_id ?>">
                    <h1><?= $_SESSION["auth"]["pseudo"]; ?></h1> <br>
                    <b>---
                        <?php if (isset($fonction)) {
                            echo "<code> $fonction </code>";
                        } ?>---
                    </b> <br>
                </div> <br>
                <hr><br>
                <div class="sidebar-profile-info redac">
                    <form enctype="multipart/form-data" method="post">
                        <div class="contai">
                            <fieldset> <br>
                                <h1>Publier</h1>
                                <label for="titre"> Titre : </label><br>
                                <input class="inp" type="text" id="titre" name="titre" size="30" maxlength="20" placeholder="Titre..." required="required"> <br><br>
                                <label for="contenu"> Contenu : </label><br>
                                <textarea name="contenu" placeholder="Contenu..." id="contenu" cols="30" rows="3" required></textarea> <br><br>
                                <label for="image">Photo : </label><br>
                                <!-- <input type="hidden" name="MAX_FILE_SIZE" value="2500000" /> -->
                                <input type="file" name="image" id="image" required> <br><br>
                                <button type="submit" name="publier">Publier</button> <br><br>
                            </fieldset>
                        </div> <br>
                        <hr><br>
                    </form>
                </div>
            </div>
        </div>

        <!---------------------main-content----------------->
        <div class="main-content">

            <!------------------------------------------------- POST 1 BEGIN --------------------------------- -->
            <div class="post">
                <?php if (@$afficher == "oui") { ?>
                    <div class="resultats">
                        <center>
                            <div class="nbr"><small><?= count($tab) . " " . (count($tab) > 1 ? " results found :"  : "result found") ?></small></div>
                        </center><br>
                        <small>
                            <?php for ($i = 0; $i < count($tab); $i++) { ?>
                                <span><a href="actu.php?id=<?= $tab[$i]["id"] ?>"> <?= $i + 1 ?> : ---> <?= $tab[$i]["titre"] ?> <---< /a></span> <br>
                            <?php } ?>
                        </small>
                    </div>
                <?php } else ?> <br>
                <hr><br>
                <hr><br><br><br>

                <?php { ?>
                    <?php
                    //recupération des articles
                    if (isset($_GET['id']) and !empty($_GET['id'])) {
                        $get_id = htmlspecialchars($_GET['id']);

                        while ($get_id >= 1) {
                            $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
                            $article->execute([$get_id]);
                            if ($article->rowCount() == 1) {
                                $article = $article->fetch();
                                $article_id = $article['id'];
                                $titre = $article['titre'];
                                $contenu = $article['contenu'];
                                $date = $article['create_time'];
                                $auteur_id = $article['user_id'];

                                //recupération de l'auteur
                                $req = $bdd->prepare("SELECT pseudo FROM sb_signin.users WHERE id = :id");
                                $req->bindValue(':id', $auteur_id);
                                $req->execute();
                                $auteur_name = $req->fetch(PDO::FETCH_ASSOC);
                                $auteur = implode(' ', $auteur_name);

                                $reqi = $bdd->prepare("SELECT email FROM sb_signin.users WHERE id = :id");
                                $reqi->bindValue(':id', $auteur_id);
                                $reqi->execute();
                                $auteur_email = $reqi->fetch(PDO::FETCH_ASSOC);
                                $auteur_email = implode(' ', $auteur_email);
                    ?>
                                <div class="post-author">
                                    <img src="../article/export2.php?id=<?= $auteur_id ?>">
                                    <div>
                                        <h1><?= $auteur ?></h1>
                                        <small><?= $date ?></small>
                                    </div>
                                </div>
                                <h4><?= $titre ?></h4> <br>
                                <p><?= $contenu ?></p>
                                <i>Auteur : <a href="profil2.php?id=<?= $auteur_id ?>"><kbd><?= $auteur ?></kbd></a></i> <br> <br>
                                <img src="../article/export.php?id=<?= $article_id ?>" width="100%" height="100%">
                                <div class="post-activiity">
                                    <button input="button" class="post-activity-link" value="Like" name="Like">
                                        <img src="images/like.png" id="like">
                                    </button>
                                    <!-- Button buy, utilisé seulement par les autres comptes que l'utilisateur  -->
                                    <?php if ($_SESSION["auth"]["id"] !== $auteur_id) { ?>
                                        <div class="buy-button-link">
                                            <a href="mailto:<?= $auteur_email ?>"><button><span>Buy</span></button></a>
                                        </div>
                                    <?php } ?>
                                </div>
                                <br>
                                <hr><br>

                    <?php $get_id = $get_id - 1;
                            }
                        }
                    } ?>
            </div>
        </div>
    <?php } ?>
    <!--------------------right-sidebar------------------>
    <div class="right-sidebar">
        <div class="sidebar-news">
            <img src="images/more.png" class="info-icon">
            <center>
                <h3 style="color: green">People in Sell&Buy</h3>
            </center>
        </div>

        <!-- Profil 1  -->
        <div class="sidebar-ad">
            <?php
            $req = $bdd->prepare("SELECT pseudo FROM users WHERE pseudo NOT LIKE ?");
            $req->execute([$_SESSION['auth']['pseudo']]);
            $requ1 = $req->fetch(PDO::FETCH_ASSOC);
            $requ1 = implode(' ', $requ1);
            $id = $bdd->prepare("SELECT id FROM users WHERE pseudo LIKE ?");
            $id->execute([$requ1]);
            $id = $id->fetch(PDO::FETCH_ASSOC);
            $id = implode(' ', $id);
            ?> <br>
            <div>
                <img src="../article/export2.php?id=<?= $id ?>">
                <h3><?= $requ1 ?></h3>
            </div>
            <b>
                ---
                <?php
                $req = $bdd->prepare("SELECT fonction FROM user_info WHERE `user_id` = ?");
                $req->execute([$id]);
                $fonction = $req->fetch(PDO::FETCH_ASSOC);
                $fonction = implode(" ", $fonction);
                echo $fonction;
                ?>
                ---
            </b>
            <a href="profil2.php?id=<?= $id ?>" class="ad-link">Voir profil ...</a>
        </div>

        <!-- profil 2 -->
        <div class="sidebar-ad">
            <?php
            $req = $bdd->prepare("SELECT pseudo FROM users WHERE pseudo NOT LIKE ? AND pseudo NOT LIKE ?");
            $req->execute([$_SESSION['auth']['pseudo'], $requ1]);
            $requ2 = $req->fetch(PDO::FETCH_ASSOC);
            $requ2 = implode(' ', $requ2);
            $id = $bdd->prepare("SELECT id FROM users WHERE pseudo LIKE ?");
            $id->execute([$requ2]);
            $id = $id->fetch(PDO::FETCH_ASSOC);
            $id = implode(' ', $id);
            ?> <br>
            <div>
                <img src="../article/export2.php?id=<?= $id ?>">
                <h3><?= $requ2 ?></h3>
            </div>
            <b>
                ---
                <?php
                $req = $bdd->prepare("SELECT fonction FROM user_info WHERE `user_id` = ?");
                $req->execute([$id]);
                $fonction = $req->fetch(PDO::FETCH_ASSOC);
                $fonction = implode(" ", $fonction);
                echo $fonction;
                ?>
                ---
            </b>
            <a href="profil2.php?id=<?= $id ?>" class="ad-link">Voir profil ...</a>

        </div>
    </div>
    </div>
    </div>

    <script>
        var choice = document.querySelector('.create-post button');

        choice.addEventListener('click', () => {
            window.open('', '_blank', 'width = 600, height = 550, left = 380, top = 70');
            window.moveTo(200, 200);
        });
    </script>
    <script src="js/main.js"></script>
</body>

</html>