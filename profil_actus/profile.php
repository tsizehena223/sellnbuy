<?php 
    require_once "../php/message.php";  
    if (!isset($_SESSION["auth"])) {
        $_SESSION["flash"]["danger"] = "You don't have the access to get in this page! Please log in with your account";
        header("Location: ../otherpages/login/html/loginy.php");
        exit();
    }
    $bdd = new PDO("mysql:host=localhost; dbname=sb_signin", "root", "");
    $user_pdp_id = $_SESSION["auth"]["id"];
    $req = $bdd -> prepare("SELECT * FROM user_info WHERE `user_id` = ?");
    $req -> execute([$user_pdp_id]);
    $requ = $req -> fetch();


    //test si l'user a déjà modifié son profil
    if ($requ > 0) {
        function select($table) {
            $user_pdp_id = $_SESSION["auth"]["id"];
            $bdd = new PDO("mysql:host=localhost; dbname=sb_signin", "root", "");
            $req = $bdd -> prepare("SELECT $table FROM user_info WHERE `user_id` = ?");
            $req -> execute([$user_pdp_id]);
            $table = $req -> fetch(PDO::FETCH_ASSOC);
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
    $article = $bdd -> query("SELECT * FROM sb_signin.articles ORDER BY create_time DESC");
    $article = $article -> fetch();

    //barre recherche 

    @$keywords = $_POST["keywords"];
    @$valider = $_POST["valider"];
    if (isset($valider) && !empty(trim($keywords))) {
        $words = explode(" ", trim($keywords));
        for ($i = 0; $i < count($words); $i++)
            $kw[$i] = "contenu LIKE '%" .$words[$i]. "%'";
        $bdd = new PDO("mysql:host=localhost; dbname=sb_signin", "root", "");
        $res = $bdd -> prepare("SELECT * FROM articles WHERE ".implode(" OR ", $kw));
        $res -> setFetchMode(PDO::FETCH_ASSOC);
        $res -> execute();
        $tab = $res -> fetchAll();
        if (!empty($keywords)) {
            $afficher = "oui";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="img/S&B.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style_search.css">
    <title>Profil - <?= $_SESSION["auth"]["pseudo"] ?></title>
</head>
<body>
    <nav class="navbar">
        <form action="" method="POST">
            <div class="navbar-left">
                <a href="actu.php?id=<?= $article['id'] ?>" class="logo"><img src="images/logo.png"></a>
                <div class="search-box">
                    <img src="images/search.png">
                    <input type="text" name="keywords" value="<?= $keywords ?>" maxlength="40">
                    <input type="submit" value="Search" name="valider">
                </div>
            </div>
        </form>

        <div class="navbar-center">
            <ul>
                <li><a href="actu.php?id=<?= $article['id'] ?>" id="home" class="j"><img src="images/home.png"> <span>Home</span></a></li>
                <li><a href="profile.php?id=<?= $_SESSION["auth"]["id"] ; ?>" id="mynetwork" class="e"><img src="images/network.png"> <span>My Network</span></a></li>
            </ul>
        </div>

        <div class="navbar-right">
            <div class="online">
                <img alt="S&B" src='../article/export2.php?id=<?= $user_pdp_id ?>' class="nav-profile-img">
            </div>
        </div>

<!--------------------------------- profile-drop-down-menu---------------------->

    <div class="profile-menu-wrap" id="profileMenu">
        <div id="dark-btn">
        </div>
        <div class="profile-menu">
            <div class="user-info">
                <img src="../article/export2.php?id=<?= $user_pdp_id ?>" alt="S&B">
                <div>
                    <h3><?= $_SESSION["auth"]["pseudo"] ; ?></h3>
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
    <div class="profile-container">
        <img src="images/cover-pic.png" width="100%">
        <div class="profile-container-inner">
            <img src='../article/export2.php?id=<?= $user_pdp_id ?>' class="profile-pic">
            <h1><?= $_SESSION["auth"]["pseudo"] ; ?></h1> <br>
            <b>
                ---
                <?php if (isset($fonction)) {
                    echo "<code> $fonction </code>";
                } ?>
                ---
            </b> <br>
            <div class="profile-btn">
                <div class="primary-btn"><a href="../php/modif_profil.php"><span>Mettre à jour</span></a></div>
                <a href="#"><img src="images/chat.png"><span><?= $_SESSION["auth"]["email"] ?></span></a>
            </div>
        </div>
    </div>
    <section class="Double-main">
        <div class="profile-main">
            <div class="profile-description">
                <?php if (isset($about)) {
                    echo "<h2>About</h2>";
                    echo "<code class='skills-btn'>$about</code> <br><br>";
                    echo "<hr>";
                } ?>

                <?php if (isset($experience)) {
                    echo "<h2>Experience</h2>";
                    echo "<code class='skills-btn'>$experience</code> <br><br>";
                    echo "<hr>";
                } ?>

                <?php if (isset($education)) {
                    echo "<h2>Education</h2>";
                    echo "<code class='skills-btn'>$education</code> <br><br>";
                    echo "<hr>";
                } ?>

                <?php if (isset($langage)) {
                    echo "<h2>Langages</h2>";
                    echo "<code class='skills-btn'>$langage</code> <br><br>";
                    echo "<hr>";
                } ?>

                <?php if (isset($skills)) {
                    echo "<h2>Skills</h2>";
                    echo "<code class='skills-btn'>$skills</code> <br><br>";
                    echo "<hr>";
                } ?>
            </div>
        </div> 

        <!-- publication -->
        <div class="publication" style="width: 100%;"> 
        <div class="post">
            <?php if (@$afficher == "oui") { ?>
                <div class="resultats">
                    <center><div class="nbr"><small><?= count($tab)." ".(count($tab) > 1 ? " results found :"  : "result found")?></small></div></center><br>
                    <small>
                        <?php for ($i = 0; $i < count($tab); $i++) { ?>
                            <span><a href="actu.php?id=<?= $tab[$i]["id"] ?>"> <?= $i + 1 ?> : ---> <?= $tab[$i]["titre"] ?> <---</a></span> <br>
                        <?php } ?>
                    </small>
                </div>
            <?php } else ?> <br><hr><br><hr><br><br><br>

            <?php { ?>
            <?php 
                //recupération des articles nopublier-le tompony

                    $id = $_SESSION['auth']['id'];
                    $arti = $bdd -> prepare("SELECT * FROM articles WHERE `user_id` = ? ORDER BY create_time DESC");
                    $arti -> execute([$id]);

                    if ($arti -> rowCount() >= 1) {
                        while ($art = $arti -> fetch()) {

                            $article_id = $art['id'];
                            $titre = $art['titre'];
                            $contenu = $art['contenu'];
                            $date = $art['create_time']; ?>

                            <div class="post-author">
                                <img src="../article/export2.php?id=<?= $_SESSION['auth']['id'] ?>">
                                <div>
                                    <h1><?= $_SESSION['auth']['pseudo'] ?></h1>
                                    <small><?= $date ?></small>
                                </div>
                            </div>
                            <h4><?= $titre ?></h4> <br>
                            <p><?= $contenu ?></p>
                            <img src="../article/export.php?id=<?= $article_id ?>" width="100%">
                            <div class="post-activiity">
                                <button input="button" class="post-activity-link" value="Like" name="Like">
                                    <img src="images/like.png" id="like">
                                </button>
                                <!-- Le propriétaire n'achète pas
                                    <div class="buy-button-link">
                                    <button><span>BUY</span></button>  
                                </div> -->
                            </div> <br>
                            <br><hr><br>
                <?php }} ?>
        </div>
    </section>
    <?php } ?>
</div>

<script>
    var btnFollow = document.querySelector('.primary-btn');
    var follow = document.querySelector('.primary-btn span');
    console.log(follow.innerHTML);
    btnFollow.addEventListener('click', () => {
        if (btnFollow.innerHTML != 'Followed') {
            btnFollow.innerHTML = 'Followed';
        }
        else {
            btnFollow.innerHTML = '<img src="images/connect.png"><span>Follow</span>';
        }
    });
</script>
<script src="Js/main.js"></script>
</body>
</html>