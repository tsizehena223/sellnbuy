<?php

//verification de l'utilisateur raha ao anaty base de données

    require_once "../php/message.php";
    if (session_status() == PHP_SESSION_NONE) { session_start();};
    $conn = new PDO ("mysql:host=localhost; dbname=sb_signin; ", "root", "");
    if (isset($_POST["login"])) {
        if (!empty($_POST["pseudo"]) && !empty($_POST["psw"])) {
            $pseudo = htmlspecialchars($_POST["pseudo"]);
            $test_user_exist = $conn -> prepare("SELECT * FROM users WHERE pseudo = ?");
            $test_user_exist -> execute([$_POST["pseudo"]]);
            $user = $test_user_exist -> fetch();
            if (password_verify($_POST["psw"], password_hash($user["psw"], PASSWORD_BCRYPT))) {
                $_SESSION["auth"] = $user;
                header('Location: ../../../profil_actus/profile.php');
                exit();
            }
            else {
                $_SESSION["flash"]["danger"] = "Password or identity incorrect";
                header("Location: ../otherpages/login/html/loginy.php");
            }
        }
    } 
    $conn = null;
?>