<?php
    // $bdd = new PDO("mysql:host=localhost; dbname=sb_signin;", "root", "");
    // if (session_status() == PHP_SESSION_NONE) { session_start(); };
    // if(isset($_GET['id']) AND !empty($_GET['id'])) {
    //     $get_id = htmlspecialchars($_GET['id']);
    //     $article = $bdd -> prepare('SELECT * FROM articles WHERE id = ?');
    //     $article -> execute([$get_id]);

    //     if($article -> rowCount() == 1) {
    //         $article = $article -> fetch();
    //         $article_id = $article['id'];
    //         $titre = $article['titre'];
    //         $contenu = $article['contenu'];
    //         $date = $article['create_time'];
    //         $auteur_id = $article['user_id'];

    //         $req = $bdd -> prepare("SELECT pseudo FROM sb_signin.users WHERE id = :id");
    //         $req -> bindValue(':id', $auteur_id);
    //         $req -> execute();
    //         $auteur_name = $req -> fetch(PDO::FETCH_ASSOC);
    //         $auteur = implode(' ', $auteur_name);

    //     } else { die('Cet article n\'existe pas !'); }

    // } else { die('Erreur'); }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <meta charset="utf-8">
</head>
<body>
    <h1><?= $titre ?></h1>
    <p><?= $contenu ?></p>
    <code><?= $date?></code> <br>
    <p>Auteur : <a href="../profil_actus/profil2.php?id=<?=$auteur_id?>" target="blank"><?= $auteur ?></a></p>

    <style>
        img {
            display: block;
            margin: auto;
            width: 80%;
            height: 100%;
        } 
    </style>
    <img src="export.php?id=<?= $article_id ?>">
</body>
</html>