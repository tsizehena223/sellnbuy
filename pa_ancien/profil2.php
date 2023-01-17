<?php

    $bdd = new PDO("mysql:host=localhost; dbname=sb_signin", "root", "");
    if (session_status() == PHP_SESSION_NONE) {session_start();}
    if(isset($_GET['id']) AND !empty($_GET['id'])) {
        $get_id = htmlspecialchars($_GET['id']);
        $user = $bdd -> prepare('SELECT pseudo FROM users WHERE id = ?');
        $user -> execute([$get_id]);
        $auteur_name = $user -> fetch(PDO::FETCH_ASSOC);
        $auteur = implode(' ', $auteur_name);

        $usermail = $bdd -> prepare('SELECT email FROM users WHERE id = ?');
        $usermail -> execute([$get_id]);
        $mail = $usermail -> fetch(PDO::FETCH_ASSOC);
        $auteur_email = implode(' ', $mail);

    } else { die('Erreur'); }

    $req = $bdd -> prepare("SELECT * FROM user_info WHERE `user_id` = ?");
    $req -> execute([$get_id]);
    $requ = $req -> fetch();

    //test si l'user a déjà modifié son profil
    if ($requ > 0) {
        function select($table) {
            $get_id = htmlspecialchars($_GET['id']);
            $bdd = new PDO("mysql:host=localhost; dbname=sb_signin", "root", "");
            $req = $bdd -> prepare("SELECT $table FROM user_info WHERE `user_id` = ?");
            $req -> execute([$get_id]);
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil - <?= $auteur ?></title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>

    <nav class="navbar">
        <div class="navbar-left">
            <a href="index.html" class="logo"><img src="images/logo.png"></a>
            <div class="search-box">
                <img src="images/search.png">
                <input type="text" placeholder="Search">
            </div>
        </div>
        <div class="navbar-center">
            <ul>
                <li><a href="../article/index.php"><img src="images/home.png"> <span>Home</span></a></li>
            </ul>
        </div>

<!--------------------------------- profile-dorp-down-menu---------------------->

        <div class="profile-menu-wrap" id="profileMenu">
            <div class="profile-menu">
                <div class="user-info">
                    <div>
                        <h3><?= $auteur ?></h3>
                    </div>
                </div>
                <hr>
                <a href="../otherpages/login/html/logout.php" class="profile-menu-link">
                    <img src="images/logout.png">
                    <p>Logout</p>
                </a>
            </div>
        </div>
    </nav>

<!-----------------------NAVBAR CLOSE------------------>

<div class="container">
    <div class="profile-main">
        <div class="profile-container">
            <img src="../img/fond1.jpg" width="100%" height="80%">
            <div class="profile-container-inner">
                <img src='../article/export2.php?id=<?= $get_id ?>'>;
                
                <h1><?= $auteur ?></h1>
                <?php if (isset($fonction)) {
                    echo "<code> $fonction </code>";
                } ?>
                
                <h6>Contact : <code><?= $auteur_email ?></code></h6>
            </div>
        </div>
        <div class="profile-description">

            <?php if (isset($about)) {
                echo "<h2>About</h2> <br>";
                echo "<code class='skills-btn'>$about</code>";
            } ?>

            <?php if (isset($experience)) {
                echo "<h2>Experience</h2> <br>";
                echo "<code class='skills-btn'>$experience</code>";
            } ?>

            <?php if (isset($education)) {
                echo "<h2>Education</h2> <br>";
                echo "<code class='skills-btn'>$education</code>";
            } ?>

            <?php if (isset($langage)) {
                echo "<h2>Langages</h2> <br>";
                echo "<code class='skills-btn'>$langage</code>";
            } ?>

            <?php if (isset($skills)) {
                echo "<h2>Skills</h2> <br>";
                echo "<code class='skills-btn'>$skills</code>";
            } ?>
        </div>

    </div>   

    <!------------------------ profile-sidebar --------------------->
    <div class="profile-sidebar">

    </div>
</div>

<script>
    let profileMenu = document.getElementById("profileMenu");

    function toggleMenu(){
        profileMenu.classList.toggle("open-menu");
    }
</script>

</body>
</html>