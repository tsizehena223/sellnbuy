<!-- <?php 

// publication ana article

    // require_once "../php/message.php";  
    // if (!isset($_SESSION["auth"])) {
    //     $_SESSION["flash"]["danger"] = "You don't have the access to get in this page! Please log in with your account";
    //     header("Location: html/loginy.php");
    //     exit();
    // }

    // //traitement donnees
    // require 'inclure_class.php';

    // $db = new PDO ("mysql:host=localhost; dbname=sb_signin", "root", "");
    // $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $gerer = new articles_manager($db);

    // if (isset($_POST['publier'])) {
    //     $article = new articles (
    //         [
    //             'titre' => $_POST['titre'],
    //             'contenu' => $_POST['contenu'],
    //             'image' => $_POST['image']
    //         ]
    //     );

    //     if ($article->is_article_valid()) {
    //         $gerer -> insert($article);
    //         header('Location: publier.php');
    //     } else {
    //         $erreurs = $article -> get_erreurs();
    //         header('Location: publier.php');
    //     }
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../boostrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../otherpages/login/css/account.css">
    <title>Publication - <?= $_SESSION["auth"]["pseudo"] ; ?></title>
</head>
<body>
    <header>
        <a href="../otherpages/login/html/logout.php"><button type="submit" class="button btn-danger">Log out</button></a>
        <h1><code><?= $_SESSION["auth"]["pseudo"] ; ?></code></h1> <br>
        <center><button class="button btn-success">Publication</button></center> <br>
    </header>

    <section>
        <fieldset>
            <form action="" method="post">
                <label for="id_titre">Titre : </label>
                <input type="text" name="titre" id="id_titre" class="form-control"> <br> <br>
                <label for="id_contenu">Contenu : </label>
                <textarea name="contenu" id="id_contenu" cols="50" rows="3" class="form-control"></textarea> <br> <br>
                <label for="id_image">Image : </label>
                <input type="file" name="image" id="id_image"> <br> <br>
                <center><input type="submit" value="Publier" class="button btn-success" name="publier"></center>
            </form>
        </fieldset>
        
    </section>
</body>
</html> -->