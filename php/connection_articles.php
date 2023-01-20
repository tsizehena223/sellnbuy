<?php

// mi-insérer article ao anay BD

    require 'inclure_class.php';

    $db = new PDO ("mysql:host=localhost; dbname=sb_signin", "root", "Tsizehena,223");
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $gerer = new articles_manager($db);

    if (isset($_POST['publier'])) {
        $article = new articles (
            [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'image' => $_POST['image']
            ]
        );

        if ($article->is_article_valid()) {
            $gerer -> insert($article);
            echo 'success';
            header('Location: publier.php');
        } else {
            $erreurs = $article -> get_erreurs();
            echo 'error';
            header('Location: publier.php');
        }
    }
