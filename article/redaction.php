<?php
$bdd = new PDO("mysql:host=localhost; dbname=sb_signin;", "root", "Tsizehena,223");

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

    header("Location: ../profil_actus/profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/redac.css">
    <title>Publier</title>
</head>

<body>
    <span><?php if (isset($message)) {
                echo $message;
            } ?></span>
    <form enctype="multipart/form-data" method="post">
        <div class="container">
            <fieldset>
                <h1><img src="../img/logo.png" alt="Sell&Buy"></h1>

                <label for="titre">Titre : </label><br><br>
                <input class="inp" type="text" id="titre" name="titre" size="30" maxlength="20" placeholder="Titre..." required="required"> <br><br>
                <label for="contenu">Contenu : </label><br><br>
                <textarea name="contenu" placeholder="Contenu..." id="contenu" cols="30" rows="5" required></textarea> <br><br>
                <label for="image">Photo : </label><br><br>
                <input type="hidden" name="MAX_FILE_SIZE" value="2500000" />
                <input type="file" name="image" id="image" required> <br><br>
                <button type="submit" name="publier">Publier</button>
            </fieldset>
        </div>
    </form>
</body>

</html>