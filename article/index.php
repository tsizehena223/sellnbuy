<!-- <?php
    $bdd = new PDO("mysql:host=localhost;dbname=sb_signin;", "root", "");
    $articles = $bdd->query('SELECT * FROM articles ORDER BY create_time DESC');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <meta charset="utf-8">
</head>
<body>
    <a href="redaction.php"><button>Créer un article</button></a>
    <ul>
        <?php while($article = $articles -> fetch()) { ?>
        <li><a href="article.php?id=<?= $article['id'] ?>"><?= $article['titre'] ?></a></li>
        <?php } ?>
    </ul>
</body>
</html> -->