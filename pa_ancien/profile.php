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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil - <?= $_SESSION["auth"]["pseudo"] ; ?></title>
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
        <div class="navbar-right">
            <div class="online">
                <img src='../article/export2.php?id=<?= $user_pdp_id ?>' class="nav-profile-img" onclick="toggleMenu()">
            </div>
        </div>

<!--------------------------------- profile-dorp-down-menu---------------------->

        <div class="profile-menu-wrap" id="profileMenu">
            <div class="profile-menu">
                <div class="user-info">
                    <img src='../article/export2.php?id=<?= $user_pdp_id ?>'>
                    <div>
                        <h3><?= $_SESSION["auth"]["pseudo"] ; ?></h3>
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
                <img src='../article/export2.php?id=<?= $user_pdp_id ?>'>
                
                <h1><?= $_SESSION["auth"]["pseudo"] ; ?></h1>
                <?php if (isset($fonction)) {
                    echo "<code> $fonction </code>";
                } ?>
                
                <h6>Contact : <code><?= $_SESSION["auth"]["email"] ; ?></code></h6>
                <a href="../php/modif_profil.php"><button class="btn btn-info">Modifier</button></a>
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