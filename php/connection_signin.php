<?php

    //insertion des utilisateurs dans la base de données

    require 'inclure_class.php';

    $db = new PDO ("mysql:host=localhost; dbname=sb_signin", "root", "");
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $manager = new users_manager($db);

    if (isset($_POST['signin'])) {
        $user = new users (
            [
                'pseudo' => $_POST['pseudo'],
                'psw' => $_POST['psw'],
                'email' => $_POST['email']
            ]
        );

        if ($user->is_user_valid()) {
            $manager -> insert($user);
            header('Location: ../otherpages/login/html/loginy.php');
        } else {
            $erreurs = $user -> get_erreurs();
            header('Location: ../otherpages/login/html/signin.php');
        }
    }

?>